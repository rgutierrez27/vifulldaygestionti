<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CapacitacionService\QRCapacitacionService;
use Illuminate\Support\Facades\Log;

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
        // Log::info('entra');
        $capacitacion = $this->argument('capacitacion');
        // Log::info($capacitacion);
        $participantes = $this->qrCapacitacionService->obtenerParticipantes($capacitacion);
        Log::info(json_encode($participantes));
        try {
            foreach ($participantes as $participante) {
                $this->qrCapacitacionService->generarQRyenviar($participante);
                // Mostrar mensaje en la consola para cada participante
                // Log::info("QR generado y enviado a: {$participante->email} para la capacitación: {$capacitacion}");
                echo "QR generado y enviado a: {$participante->email} para la capacitación: {$capacitacion}\n";
            }
        } catch (\Exception $e) {
            $this->error("Error al generar o enviar los códigos QR: " . $e->getMessage());
        }

        return 0;
    }
}
