<?php

namespace App\Repositories\TeacherRepositorie;

use Illuminate\Support\Facades\DB;

class TeacherRepositorie{
    public static function getTeacherRecordsByPersonCode($person_code){
        $teacher_records = DB::connection('mysql_erp_integrado')
            ->table('aca_docente')
            ->where('persona', $person_code)
            ->select('docente as main_code')
            ->first();

        return $teacher_records;
    }

    public static function getTeacherSchedule($person_code, $main_code){
        $schedules        = DB::connection('mysql_erp_integrado')
            ->select("CALL sp_appPerfilDocente(?,?)", [2, "$main_code~$person_code"]);
        return $schedules;
    }
}