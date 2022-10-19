<?php

namespace App\Http\Controllers;

use App\Helpers\DateTimeCarbonHelper;
use App\Helpers\GeneralHelper;
use App\Participant;
use App\PersonaUCT;
use Illuminate\Http\Request;
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

    public function landigpageindex(){
        return view('landigpageindex');
    }

    public function registerForm(){
        return view('registerForm');
    }

    public function confirmemailsuccess(){
        return view('confirmForm');
    }

    public function sorteoIframe(){
        return view('iframeSorteo');
    }


    public function addparticipant (Request $request){
        $primerNombre = $request->names1;
        $segundoNombre = $request->names2;
        $apellidoPaterno = $request->lastname1;
        $apellidoMaterno = $request->lastname2;
        $dni =  $request->dni;
        $email = $request->email;
        $phone =  $request->phone;
        $organization = $request->organization;
        $is_certificate = $request->is_certificate;


        if (!is_numeric($dni)) {
            return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false], 400);
        }

        // VALIDAR longintud de dni
        if (strlen($dni) != 8) {
            return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false], 400);
        }

        $persona =  PersonaUCT::where('numerodocumento', $dni)->first();
        if (!$persona) { // Si no existe la persona en la base de datos de la UCT, la creamos
            $codigoPersona =  intval(PersonaUCT::where('persona', 'not like', "%U%")->max('persona')) + 1;
            $codigoPersona = GeneralHelper::formatNumberToRight(8, $codigoPersona); // longitud, codigo
            $personaSelect2 = PersonaUCT::create([
                    'persona' => $codigoPersona,
                    'apellidopaterno' => $apellidoPaterno,
                    'apellidomaterno' => $apellidoMaterno,
                    'primernombre' => $primerNombre,
                    'segundonombre' => $segundoNombre,
                    'nombrecompleto' => $apellidoPaterno . ' ' . $apellidoMaterno . ' ' . $primerNombre. ' ' . $segundoNombre,
                    'fechanacimiento' => null,
                    'direccion' => '',
                    'email' => $email,
                    'celular' => $phone,
                    'tipodocumento' => '01',
                    'estadocivil' => '02',
                    'niveleducativo' => '07',
                    'tipovia' => null,
                    'via' => null,
                    'numerovia' => null,
                    'tipozona' => null,
                    'zona' => null,
                    'pais' => '9589',
                    'departamentonacimiento' => null,
                    'provincianacimiento' => null,
                    'distritonacimiento' => null,
                    'departamento' => null,
                    'provincia' => null,
                    'distrito' => null,
                    'numerodocumento' => $dni,
                    'usuario' => "", //$dni
                    'password' => "",
                    'activo' => 0, // 0: para postulnate
                    'fecharegistro' => DateTimeCarbonHelper::getDateTime(),
                    'usuarioregistro' => 'user-congreso',
                    'cambiosuclave' => 1,
                    'googlemail' => '',
                    'tipodiscapacidad' => null,
                    'aspirante' => null,
                    'paisnacimiento' => '9589',
                    'tiposangre' => null,
                    'periodo_ingreso' => null,
                    'semestre_ingreso' => null
            ]);

            $personaSelect = $personaSelect2->persona;
        }else{ // Si existe la persona en la base de datos de la UCT, validamos que no tenag registro para este congreso
            $persona = PersonaUCT::where('numerodocumento', $dni)->first();
            $personaSelect = $persona->persona;
            $participant = Participant::where('persona', $personaSelect)->where('is_delete', 0)->first();
            if ($participant) {
                return response()->json([
                    'message' => 'Ya se encuentra registrado en el congreso',
                    'status' => 400
                ], 400);
            }

        }

        $confirmation_code = Str::random(25);
            $participant = Participant::create([
                'persona' => $personaSelect ,
                'nombre_evento' => 'Congreso UCT 2022',
                'codigo_evento' => 'CONGRESO2022',
                'organization' => $organization,
                'confirmed' => 0 ,
                'confirmation_code' => $confirmation_code,
                'is_delete' => 0 ,
                'is_certificado' => $is_certificate,
            ]);

            // Send confirmation code
            Mail::send('emails.confirmation_code', ["confirmation_code"=>$confirmation_code,'names' => $primerNombre], function($message) use ($request) {
                $message->to($request->email, $request->names)->subject('Por favor confirma tu correo');
            });

            return response()->json(["error"=>false,'message' => "Registro Exitoso"], 200);
    }



    public function changeOptionCerticate (Request $request){
        $idParticipan = $request->idParticipant;
        // $is_certificate = $request->is_certificate ?? false;


        $infoParcticipant = Participant::where('id_participante',$idParticipan)
                        ->first();

        if ($infoParcticipant->is_certificado == 1) {
            $valorCertificate = 0;
        }else{
            $valorCertificate = 1;
        }

        $infoParcticipant->is_certificado =  $valorCertificate;
        $infoParcticipant->save();
        return response()->json(["error"=>false,'message' => "Operación Exitosa"], 200);
    }

    public function deleteParticipant (Request $request){
        $idParticipan = $request->idParticipant;
        // $is_certificate = $request->is_certificate ?? false;


        $infoParcticipant = Participant::where('id_participante',$idParticipan)
                        ->first();

        $infoParcticipant->is_delete =  1;
        $infoParcticipant->save();
        return response()->json(["error"=>false,'message' => "Operación Exitosa"], 200);
    }

    public function verify($code)
    {
        $participant = Participant::where('confirmation_code', $code)->first();

        if (! $participant)
            return redirect('/');

        $participant->confirmed = true;
        $participant->confirmation_code = null;
        $participant->save();

        return redirect('/confirmemailsuccess');
    }


    public function listparticipantes(){
        return view('listParticipants');
    }

    public function indexSorteo(){
        return view('sorteoParticipants');
    }

    public function getparticipant(){
        $infoParcticipant = Participant::select('mae_persona.nombrecompleto', 'mae_persona.email', 'mae_persona.celular', 'aca_congreso_participantes.organization',                'aca_congreso_participantes.id_participante', 'aca_congreso_participantes.is_certificado', 'aca_congreso_participantes.confirmed')
                            ->where('is_delete',0)
                            ->join('mae_persona','mae_persona.persona','=','aca_congreso_participantes.persona')
                            ->get();
        return response()->json(["error"=>false,'infoParcticipant' => $infoParcticipant], 200);
    }

    public function validardni($dni){

        if (!is_numeric($dni)) {
            return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false]);
        }

        // VALIDAR longintud de dni
        if (strlen($dni) != 8) {
            return response()->json(['error' => true, 'message' => 'DNI no valido', "flag" => false]);
        }

        $persona =  PersonaUCT::where('numerodocumento', $dni)->first();

        if ($persona) {
            $data = [
                'nombre1' => $persona->primernombre,
                'nombre2' => $persona->segundonombre,
                'apellidoPaterno' => $persona->apellidopaterno,
                'apellidoMaterno' => $persona->apellidomaterno,
                'email' => $persona->email,
                'telefono' => $persona->telefono,
            ];
            return  response()->json(["error"=>false, 'data' => $data], 200);
        }else{
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
