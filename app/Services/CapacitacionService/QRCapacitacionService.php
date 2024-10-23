<?php

namespace App\Services\CapacitacionService;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Log;
use App\Helpers\GeneralHelper;
use Illuminate\Support\Facades\Mail;

class QRCapacitacionService{

    public function generarQRyenviar($participante)
    {
        $erp_url = config('app.env', 'production') == 'production'
                ? 'https://erp.uct.edu.pe'
                : 'https://testerp.uct.edu.pe';
    
        $data = "{$participante->capacitacion}*{$participante->persona}*{$participante->auxiliar}";
    
        $dataencryp = GeneralHelper::encriptString($data);
        $dataUrl = $erp_url . '/verificacionCapacitacion.php?i=' . $dataencryp;
        
        $qrCode = QrCode::create($dataUrl)->setSize(300)->setMargin(10);
        $timestamp = time();

        $fileName = "{$participante->capacitacion}_{$participante->auxiliar}_{$timestamp}.png";
        $folderPath = 'public/capacitacion/qr';
        $filePath = "{$folderPath}/{$participante->capacitacion}/{$fileName}";
    
        if (!Storage::exists($folderPath . '/' . $participante->capacitacion)) {
            Storage::makeDirectory($folderPath . '/' . $participante->capacitacion, 0777, true);
            chmod(Storage::path($folderPath . '/' . $participante->capacitacion), 0777);
        }
    
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $result->saveToFile(Storage::path($filePath));

        if ($result) {
            DB::connection('mysql_erp_integrado')
                ->table('cap_capacitacionparticipante')
                ->where('capacitacion', $participante->capacitacion) 
                ->where('persona', $participante->persona) 
                ->where('auxiliar', $participante->auxiliar) 
                ->update([
                    'rutaqr' =>  ".../capacitacion/qr/{$participante->capacitacion}/{$fileName}",
                    'envioqr'=>  "1"]);
        } 
        $this->enviarQR($participante, $filePath);
    }
    
    public function obtenerParticipantes($capacitacion)
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
                            $query->where('pa.envioqr', '0')
                                ->orWhereNull('pa.envioqr'); 
                        })
                        ->where('det.modalidad', '2') //PRESENCIAL
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
                        ->get();
        return $participantes;
    }

    public function enviarQR($participante, $filePath)
    {
        $payment_url        = config('app.env', 'production') == 'production'
            ? 'https://pagonline.uct.edu.pe'
            : 'https://pasarelatest.uct.edu.pe';

        $congreso_url       = config('app.env', 'production') == 'production'
            ? 'https://congresos.uct.edu.pe'
            : 'https://congresotest.uct.edu.pe';

        $qrFilePath         = Storage::path($filePath);
        $filePath           = str_replace('public/', '/storage/', $filePath);

        $img_qr_congreso    = $congreso_url . $filePath;

        if (!empty($participante->email)) {
            Mail::send('emails.sendQRevent', [
                'participante'  => $participante,
                'nameEvent'     => $participante->descripcion,
                'payment_url'   => $payment_url,
                'ImagePath'     => $img_qr_congreso
            ], function ($message) use ($participante, $qrFilePath) {
                $message->to($participante->email, $participante->nombrecompleto)
                    ->subject("ACCESO A {$participante->descripcion}")
                    ->attach($qrFilePath, [
                        'as' => 'qr_evento.png',    
                        'mime' => 'image/png',      
                        'content_id' => 'qr_code',  
                        'inline' => true,           
                    ]);
            });
        } else {
            Log::info("No se puede enviar el QR, el participante no tiene email: " . $participante->auxiliar);
        }
    }
}