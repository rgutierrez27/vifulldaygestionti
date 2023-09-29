<?php

namespace App\Repositories\StudentRepositorie;

use Illuminate\Support\Facades\DB;

class StudentRepositorie{
    public static function getStudentRecordsByPersonCode($person_code, $app_movil = false){
        $student_records = DB::connection('mysql_erp_integrado')
            ->table('mae_alumno AS a')
            ->join('mae_estructura AS e', 'a.estructura', '=', 'e.estructura')
            ->where('a.persona', $person_code)
            ->select('a.alumno as main_code', 'e.descripcion as description', 'a.vigente as active');

        if($app_movil == true){
            $student_records = $student_records->where('a.vigente', 1);
        }

        $student_records = $student_records
            ->orderBy('a.vigente', 'desc')
            ->get();

        $codes = [];
        //De todos los registros de estudiantes, si hay codigos repetidos, se toma el primero, el vigente
        $student_records = $student_records->filter(function($item) use (&$codes){
            if(in_array($item->main_code, $codes))
                return false;
            $codes[] = $item->main_code;
            return true;
        });

        return $student_records;
    }
}
