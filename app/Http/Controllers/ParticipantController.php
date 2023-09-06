<?php

namespace App\Http\Controllers;

use App\Concept;
use App\Helpers\DateTimeCarbonHelper;
use App\Helpers\GeneralHelper;
use App\Participant;
use App\PersonaUCT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function landigpageindex()
    {
        $events = DB::table('cap_capacitacion')
            ->select('capacitacion', 'descripcion', 'concepto_inscripcion', 'concepto_certificado', 'fechainicio', 'fechatermino', 'url_name')
            ->where('fechatermino', '>', now('America/Lima'))
            ->where('activo', 1)
            ->get();

        // $sql = "SELECT cp.descripcion, me.descripcion, me.estructura  FROM cap_capacitacion  cp
        //     INNER JOIN per_cargoestructura pc ON cp.cargoestructura = pc.cargoestructura
        //     INNER JOIN mae_estructura me ON me.estructura = pc.estructura
        //     WHERE CURRENT_DATE() BETWEEN fechainicio AND fechatermino;
        //     GROUP BY me.estructura";
        DB::connection('mysql_erp_integrado')->statement("SET SQL_MODE=''");
        $facultades = DB::connection('mysql_erp_integrado')->table('cap_capacitacion as cp')
        ->join('per_cargoestructura as pc', 'cp.cargoestructura', '=', 'pc.cargoestructura')
        ->join('mae_estructura as me', 'me.estructura', '=', 'pc.estructura')
        ->select('me.estructura', 'descripcion_capacitacion', 'descripcion_estructura')
        ->whereRaw('CURRENT_DATE() BETWEEN cp.fechainicio AND cp.fechatermino')
        ->where('cp.activo', 1)
        ->groupBy('me.estructura')
        ->get();
        return view('landigpageindex', ['events' => $events, 'facultades' => $facultades]);
    }

    public function registerForm($codeName, $event_name)
    {
        $event = DB::table('cap_capacitacion')
            ->select('capacitacion', 'descripcion', 'concepto_inscripcion', 'concepto_certificado')
            ->where('url_name', $event_name)
            ->where('fechatermino', '>', now('America/Lima'))
            ->first();

        if(!$event)
            return response('No se encontró evento', 404);

        $concepto_inscripcion = Concept::select('descripcioncompleta', 'importe', 'concepto')->with('detail')->find($event->concepto_inscripcion);
        $concepto_certificado = Concept::select('descripcioncompleta', 'importe', 'concepto')->with('detail')->find($event->concepto_certificado);

        return view('registerForm', [
            "event"                 => $event,
            "concepto_inscripcion"  => $concepto_inscripcion,
            'concepto_certificado'  => $concepto_certificado
        ]);
    }

    public function eventsByFacultad($codeName){

        // cortar cadena a partir del tercer caracter
        $codeName = substr($codeName, 3);


        $events_by_facultad = DB::connection('mysql_erp_integrado')->table('cap_capacitacion as cp')
        ->join('per_cargoestructura as pc', 'cp.cargoestructura', '=', 'pc.cargoestructura')
        ->join('mae_estructura as me', 'me.estructura', '=', 'pc.estructura')
        ->select('me.estructura', 'cp.tipo as tipo_evento','cp.url_name', 'cp.descripcion as descripcion_capacitacion', 'me.descripcion as descripcion_estructura', 'cp.fechainicio', 'cp.fechatermino')
        ->whereRaw('CURRENT_DATE() BETWEEN cp.fechainicio AND cp.fechatermino')
        ->where('cp.activo', 1)
        ->where('me.estructura', $codeName)
        ->get();

        // return json_encode($events_by_facultad);
        return view('eventsByFacultad', ['events' => $events_by_facultad]);
    }

    public function confirmemailsuccess()
    {
        return view('confirmForm');
    }

    public function sorteoIframe()
    {
        return view('iframeSorteo');
    }


    public function addparticipant(Request $request)
    {
        $primerNombre       = $request->names1;
        $segundoNombre      = $request->names2;
        $apellidoPaterno    = $request->lastname1;
        $apellidoMaterno    = $request->lastname2;
        $numeroDocumento    = $request->dni;
        $email              = $request->email;
        $phone              = $request->phone;
        $is_certificate     = $request->is_certificate;
        $tipoDocumento      = $request->typeDocument;
        $incription_concept     = $request->incription_concept;
        $certificate_concept    = $request->certificate_concept;
        $event                  = $request->event;


        if ($tipoDocumento == '01') {
            if (!is_numeric($numeroDocumento)) {
                return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false]);
            }

            // VALIDAR longintud de dni
            if (strlen($numeroDocumento) != 8) {
                return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false]);
            }
        } else if ($tipoDocumento == '05' || $tipoDocumento == '07') {
            // if (strlen($dni) != 12) {
            //     return response()->json(['error' => true, 'message' => 'Numero de document no valido', "flag" => false]);
            // }
        } else if ($tipoDocumento == '06') {
            if (strlen($numeroDocumento) != 11) {
                return response()->json(['error' => true, 'message' => 'RUC no valido', "flag" => false]);
            }
        }


        $res = DB::connection('mysql_erp_integrado')->select("CALL sp_capInsertarParticipantesWeb(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
            '1',
            $tipoDocumento,
            $numeroDocumento,
            $primerNombre,
            $segundoNombre,
            $apellidoPaterno,
            $apellidoMaterno,
            $email,
            $phone,
            '',
            $is_certificate,
            $event,
            'auto',
            $incription_concept  == '' ? null : $incription_concept,
            $certificate_concept == '' ? null : $certificate_concept
        ]);
        $resp =  $res[0]->result;

        if ($resp == 'OK') {
            $confirmation_code = Str::random(25);
            $event = DB::table('cap_capacitacion')
                ->select('capacitacion', 'descripcion', 'concepto_inscripcion', 'concepto_certificado')
                ->where('capacitacion', $event)
                ->first();
            $event_name = $event->descripcion;
            $payment_url = config('app.env', 'production') == 'production'
                ? 'https://pagonline.uct.edu.pe/externos'
                : 'https://pasarelatest.uct.edu.pe/externos';

            // Send confirmation code
            Mail::send('emails.confirmation_code', [
                "confirmation_code" => $confirmation_code,
                'names'         => $primerNombre,
                'event'         => $event,
                'payment_url'   => $payment_url
            ], function ($message) use ($request, $event_name) {
                $message->to($request->email, $request->names)->subject("REGISTRO EVENTO $event_name");
            });
        }

        return response()->json(["error" => false, 'message' => $resp], 200);
    }



    public function changeOptionCerticate(Request $request)
    {
        $idParticipan = $request->idParticipant;
        // $is_certificate = $request->is_certificate ?? false;


        $infoParcticipant = Participant::where('id_participante', $idParticipan)
            ->first();

        if ($infoParcticipant->is_certificado == 1) {
            $valorCertificate = 0;
        } else {
            $valorCertificate = 1;
        }

        $infoParcticipant->is_certificado =  $valorCertificate;
        $infoParcticipant->save();
        return response()->json(["error" => false, 'message' => "Operación Exitosa"], 200);
    }

    public function deleteParticipant(Request $request)
    {
        $idParticipan = $request->idParticipant;
        // $is_certificate = $request->is_certificate ?? false;


        $infoParcticipant = Participant::where('id_participante', $idParticipan)
            ->first();

        $infoParcticipant->is_delete =  1;
        $infoParcticipant->save();
        return response()->json(["error" => false, 'message' => "Operación Exitosa"], 200);
    }

    public function verify($code)
    {
        $participant = Participant::where('confirmation_code', $code)->first();

        if (!$participant)
            return redirect('/');

        $participant->confirmed = true;
        $participant->confirmation_code = null;
        $participant->save();

        return redirect('/confirmemailsuccess');
    }


    public function listparticipantes()
    {
        return view('listParticipants');
    }

    public function indexSorteo()
    {
        return view('sorteoParticipants');
    }

    public function getparticipant()
    {
        $infoParcticipant = Participant::select('mae_persona.nombrecompleto', 'mae_persona.email', 'mae_persona.celular', 'aca_congreso_participantes.organization',                'aca_congreso_participantes.id_participante', 'aca_congreso_participantes.is_certificado', 'aca_congreso_participantes.confirmed')
            ->where('is_delete', 0)
            ->join('mae_persona', 'mae_persona.persona', '=', 'aca_congreso_participantes.persona')
            ->get();
        return response()->json(["error" => false, 'infoParcticipant' => $infoParcticipant], 200);
    }

    public function validardni($dni, $tipoDocumento)
    {


        if ($tipoDocumento == '01') { // DNI
            if (!is_numeric($dni)) {
                return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false]);
            }

            // VALIDAR longintud de dni
            if (strlen($dni) != 8) {
                return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false]);
            }
        } else if ($tipoDocumento == '05' || $tipoDocumento == '07') { // Carnet de extranjeria o Pasaporte
            // if (strlen($dni) != 12) {
            //     return response()->json(['error' => true, 'message' => 'Numero de document no valido', "flag" => false]);
            // }
        } else if ($tipoDocumento == '06') { // RUC
            if (strlen($dni) != 11) {
                return response()->json(['error' => true, 'message' => 'RUC no valido', "flag" => false]);
            }
        }


        $persona =  PersonaUCT::where('numerodocumento', $dni)->first();

        if ($persona) {
            $data = [
                'nombre1' => $persona->primernombre,
                'nombre2' => $persona->segundonombre,
                'apellidoPaterno' => $persona->apellidopaterno,
                'apellidoMaterno' => $persona->apellidomaterno,
                'email' => $persona->email,
                'telefono' => $persona->celular,
            ];
            return  response()->json(["error" => false, 'data' => $data], 200);
        } else {
            $data = [];
            return response()->json(['error' => false, 'data' => []]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
