<?php

namespace App\Http\Controllers;

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
        return view('landigpageindex');
    }

    public function registerForm()
    {
        return view('registerForm');
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
        $primerNombre = $request->names1;
        $segundoNombre = $request->names2;
        $apellidoPaterno = $request->lastname1;
        $apellidoMaterno = $request->lastname2;
        $numeroDocumento =  $request->dni;
        $email = $request->email;
        $phone =  $request->phone;
        $organization = $request->organization;
        $is_certificate = $request->is_certificate;
        $tipoDocumento = $request->typeDocument;


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

        // CALL sp_capInsertarParticipantesWeb(
        //     '1', #Flag por defecto
        //     '01', #Tipo de documento segun el erp
        //     '40060948', #Numero documento
        //     'ORLANDO', #Primer nombre
        //     'MARTÍN', #Segundo nombre
        //     'SANCHEZ', #Apellido Paterno
        //     'CASTILLO', #Apellido Materno
        //     'orlandosanchez78@hotmail.com', #Email
        //     '947904641', #Celular
        //     '000004', #Id institucion aca_institucion
        //     '1', #Requiere certificado
        //     'CP20220001', #Codigo de capacitacion: cap_capacitacion
        //     'auto' #Usuario registra
        // );

        $res = DB::connection('mysql_erp_integrado')->select("CALL sp_capInsertarParticipantesWeb(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", ['1', $tipoDocumento, $numeroDocumento, $primerNombre, $segundoNombre, $apellidoPaterno, $apellidoMaterno, $email, $phone, '', $is_certificate, 'CP20220001', 'auto']);
        $resp =  $res[0]->result;

        if ($resp == 'OK') {
            $confirmation_code = Str::random(25);

            // Send confirmation code
            Mail::send('emails.confirmation_code', ["confirmation_code" => $confirmation_code, 'names' => $primerNombre], function ($message) use ($request) {
                $message->to($request->email, $request->names)->subject('Por favor confirma tu correo');
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
