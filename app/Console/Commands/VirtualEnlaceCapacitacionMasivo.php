<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CapacitacionService\QRCapacitacionService;
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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
