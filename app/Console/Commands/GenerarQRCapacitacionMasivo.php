<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CapacitacionService\QRCapacitacionService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class GenerarQRCapacitacionMasivo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'qr:generar-masivo {capacitacion}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera y envía códigos QR masivos para una capacitación';
    /**
     * El servicio que manejará la generación y envío de QR.
     *
     * @var QRCapacitacionService
     */
    protected $qrCapacitacionService;
    /**
     * Create a new command instance.
     *
     * @param QRCapacitacionService $qrCapacitacionService
     * @return void
     */
    public function __construct(QRCapacitacionService $qrCapacitacionService)
    {
        parent::__construct();
        $this->qrCapacitacionService = $qrCapacitacionService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $capacitacion = $this->argument('capacitacion');
        $participantes = $this->qrCapacitacionService->obtenerParticipantes($capacitacion);
        $participante = $participantes->first();
    
        if ($participante) {
            $fechaInicioCapacitacion = $participante->fechainiciocapacitacion;            
            $fechaActualLima = Carbon::now('America/Lima');
    
            if (!empty($fechaInicioCapacitacion) && $fechaActualLima->isBefore(Carbon::parse($fechaInicioCapacitacion))) {
                try {
                    foreach ($participantes as $participante) {
                        $this->qrCapacitacionService->generarQRyenviar($participante);
                        // Log::info("QR generado y enviado a: {$participante->email} para la capacitación: {$capacitacion}");
                        echo "QR generado de {$participante->auxiliar} y enviado a: {$participante->email} para la capacitación: {$capacitacion}\n";

                        sleep(3);
                    }
                } catch (\Exception $e) {
                    $this->error("Error al generar o enviar los códigos QR: " . $e->getMessage());
                }
            } else {
                echo "La fecha actual no es antes de la fecha de inicio de capacitación.";
            }
        } else {
            echo "No se encontraron participantes para la capacitación.";
        }
    
        return 0;
    }
}
