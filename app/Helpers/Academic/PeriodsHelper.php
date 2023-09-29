<?php

namespace App\Helpers\Academic;

use Illuminate\Support\Facades\DB;
use stdClass;

class PeriodsHelper{
    public static function getPeriodoActual(){
        $semester = DB::connection('mysql_erp_integrado')
        ->select("SELECT semestre FROM mae_semestre  WHERE vigente = 1 AND activo = 1 ORDER BY semestre DESC")[0];

        return $semester->semestre;
    }

    public static function getPeriodsByStudent($student_code, $person_code, $sede, $school_code){
        $periods = DB::connection('mysql_erp_integrado')
            ->select("SELECT DISTINCT semestre FROM aca_rendimiento WHERE alumno = ? AND persona = ? AND sede = ? AND estructura = ? ORDER BY semestre DESC", [$student_code, $person_code, $sede, $school_code]);
        $periods            = collect($periods)->map(function($period){
            $object = new stdClass();
            $object->key     = $period->semestre;
            $object->value   = $period->semestre;
            return $object;
        })->sortBy([
            ['value', 'desc']
        ])->values()->all();
        return $periods;
    }

    public static function getPeriodoMatricula(){
        $periodo_matricula = DB::connection('mysql_erp_integrado')->select('SELECT valor FROM  mae_parametro WHERE parametro = ?', ['PERIODOMAT']);
        return $periodo_matricula[0]->valor;

    }
}
