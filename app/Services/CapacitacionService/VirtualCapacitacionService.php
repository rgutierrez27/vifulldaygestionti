<?php

namespace App\Services\CapacitacionService;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class VirtualCapacitacionService{

    public function obtenerParticipantesVirtual($capacitacion)
    {
        $participantes = DB::connection('mysql_erp_integrado')
                        ->table('cap_capacitacionparticipante as pa')
                        ->join('cap_capacitacion as cap', 'pa.capacitacion', '=', 'cap.capacitacion')
                        ->join('mae_persona as p', 'p.persona', '=', 'pa.persona')
                        ->join('cob_concepto_detalle as det', function($join) {
                            $join->on('det.capacitacion', '=', 'cap.capacitacion')
                                ->on('det.concepto', '=', 'cap.concepto_inscripcion')
                                ->on('det.id', '=', DB::raw('SUBSTRING(pa.concepto_inscripcion, 2)'));
                        })
                        ->where('cap.capacitacion', $capacitacion)
                        ->where(function($query) {
                            $query->where('pa.envioenlace', '0')
                                ->orWhereNull('pa.envioenlace');
                        })
                        ->where('pa.pago_realizado', '1')
                        ->where('det.modalidad', '1') //VIRTUAL
                        ->select(
                            'cap.capacitacion',
                            'cap.fechainicio',
                            'cap.fechatermino',
                            'cap.descripcion',
                            'pa.persona',
                            'pa.auxiliar',
                            'p.nombrecompleto',
                            'p.email',
                            'pa.concepto_inscripcion',
                            'pa.pago_realizado',
                            'cap.fechainiciocapacitacion',
                            'cap.fechafincapacitacion',
                            'det.descripcion AS estudiante',
                            'det.modalidad'
                        )
                        ->limit(200)
                        ->get();
        return $participantes;
    }

    public function enviarEnlace($participante)
    {
        $enlace_virtual        = 'https://uct-edu-pe.zoom.us/j/82925686224';

        if (!empty($participante->email)) {
            Mail::send('emails.sendEnlaceEvent', [
                'participante'  => $participante,
                'nameEvent'     => $participante->descripcion,
                'enlace_virtual'=> $enlace_virtual,
            ], function ($message) use ($participante) {
                $message->to($participante->email, $participante->nombrecompleto)
                    ->subject("{$participante->descripcion}");
            });

            if (count(Mail::failures()) == 0) {
                DB::connection('mysql_erp_integrado')
                ->table('cap_capacitacionparticipante')
                ->where('capacitacion', $participante->capacitacion)
                ->where('persona', $participante->persona)
                ->where('auxiliar', $participante->auxiliar)
                ->update([
                    'envioenlace' => "1"
                ]);
            } else {
                Log::info("El correo no pudo ser enviado al participante: " . $participante->auxiliar);
            }

        } else {
            Log::info("No se puede enviar el enlace, el participante no tiene email: " . $participante->auxiliar);
        }
    }
}
