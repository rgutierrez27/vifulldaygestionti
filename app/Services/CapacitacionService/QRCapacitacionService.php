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
        Log::info($erp_url);
    
        $data = "{$participante->capacitacion}*{$participante->persona}*{$participante->auxiliar}";
    
        $dataencryp = GeneralHelper::encriptString($data);
        $dataUrl = $erp_url . '/verificacionCapacitacion.php?i=' . $dataencryp;
    
        Log::info("URL QR: " . $dataUrl); 
    
        $qrCode = QrCode::create($dataUrl)->setSize(300)->setMargin(10);
    
        $fileName = "{$participante->capacitacion}_{$participante->auxiliar}.png";
        $folderPath = 'public/capacitacion/qr';
        $filePath = "{$folderPath}/{$participante->capacitacion}/{$fileName}";
    
        if (!Storage::exists($folderPath . '/' . $participante->capacitacion)) {
            Storage::makeDirectory($folderPath . '/' . $participante->capacitacion, 0777, true);
            chmod(Storage::path($folderPath . '/' . $participante->capacitacion), 0777);
        }
    
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $result->saveToFile(Storage::path($filePath));
    
        Log::info("QR guardado en: " . Storage::path($filePath));
        // // Enviar el QR al participante (se podría guardar en disco o enviarlo por email)
        $this->enviarQR($participante, Storage::path($filePath));
    }
    
    public function obtenerParticipantes($capacitacion)
    {
        $participantes = DB::connection('mysql_erp_integrado')
                        ->table('cap_capacitacionparticipante as pa')
                        ->join('cap_capacitacion as cap', 'pa.capacitacion', '=', 'cap.capacitacion')
                        ->join('mae_persona as p', 'p.persona', '=', 'pa.persona')
                        ->where('cap.capacitacion', $capacitacion)
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
                            'pa.pago_realizado'
                        )
                        ->limit(1)
                        ->get();

        return $participantes;
    }

    public function enviarQR($participante, $qrFilePath)
    {
        Mail::send('emails.sendQRevent', [
            'names' => $participante->nombrecompleto,
            'event' => $participante->descripcion
        ], function ($message) use ($participante, $qrFilePath) {
            $message->to($participante->email, $participante->nombrecompleto)
                    ->subject("REGISTRO EVENTO {$participante->descripcion}")
                    ->attach($qrFilePath, [
                        'as' => 'qr_evento.png', // Nombre con el que se adjunta el archivo
                        'mime' => 'image/png',    // Tipo MIME del archivo
                    ]);
        });
    }
}