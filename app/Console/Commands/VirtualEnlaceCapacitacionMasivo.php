<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CapacitacionService\VirtualCapacitacionService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class VirtualEnlaceCapacitacionMasivo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'virtual:envio-enlace';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía enlace para congreso virtual';

     /**
     * El servicio que manejará la generación y envío de QR.
     *
     * @var VirtualCapacitacionService
     */
    protected $virtualCapacitacionService;

    /**
     * Create a new command instance.
     *
     * @param VirtualCapacitacionService $virtualCapacitacionService
     * @return void
     */

    public function __construct(VirtualCapacitacionService $virtualCapacitacionService)
    {
        parent::__construct();
        $this->virtualCapacitacionService = $virtualCapacitacionService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $capacitacion   = 'CP20240010';
        $participantes  = $this->virtualCapacitacionService->obtenerParticipantesVirtual($capacitacion);
        $participante   = $participantes->first();

        if ($participante) {
            try {
                foreach ($participantes as $participante) {
                    $this->virtualCapacitacionService->enviarEnlace($participante);
                    // Log::info("Enlace enviado a {$participante->auxiliar} al correo: {$participante->email} para la capacitación: {$capacitacion}");
                    echo "Enlace enviado a {$participante->auxiliar} al correo: {$participante->email} para la capacitación: {$capacitacion}\n";
                    sleep(2);
                }
            } catch (\Exception $e) {
                $this->error("Error al generar o enviar los códigos QR: " . $e->getMessage());
            }         
        } else {
            echo "No se encontraron participantes para la capacitación.";
        }

        return 0;
    }
}
