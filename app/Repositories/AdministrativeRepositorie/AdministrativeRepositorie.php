<?php

namespace App\Repositories\AdministrativeRepositorie;

use Illuminate\Support\Facades\DB;

class AdministrativeRepositorie{
    public static function getAdministrativeRecordsByPersonCode($person_code){
        $administrative_records = DB::connection('mysql_erp_integrado')
            ->table('per_trabajador')
            ->where('persona', $person_code)
            ->select('trabajador as main_code')
            ->first();

        return $administrative_records;
    }
}