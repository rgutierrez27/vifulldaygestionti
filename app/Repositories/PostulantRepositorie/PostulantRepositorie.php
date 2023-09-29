<?php

namespace App\Repositories\PostulantRepositorie;

use App\Helpers\Academic\PeriodsHelper;
use Illuminate\Support\Facades\DB;

class PostulantRepositorie{
    public static function getPostulantRecordsByPersonCode($person_code){
        $current_semester = PeriodsHelper::getPeriodoActual();
        $postulant_records = DB::connection('mysql_erp_integrado')
            ->table('adm_postulanteadmision')
            ->where('persona', $person_code)
            ->where('semestre', $current_semester)
            ->select('postulante as main_code')
            ->orderBy('fechainscripcion', 'desc')
            ->first();

        return $postulant_records;
    }

    public static function authenticateWithDocumentNumberAndPassword($document_number, $password){
        $current_semester = PeriodsHelper::getPeriodoActual();
        $postulant_record = DB::connection('mysql_erp_integrado')
            ->table('adm_postulanteadmision as ap')
            ->join('adm_postulante as a', 'a.persona', '=', 'ap.persona')
            ->join('mae_persona as p', 'p.persona', '=', 'a.persona')
            ->orderBy('fechainscripcion', 'desc')
            ->where('p.numerodocumento', $document_number)
            ->where('a.claveinicio', $password)
            ->where('ap.semestre', $current_semester)
            ->select('ap.postulante as main_code', 'p.persona as person_code')
            ->first();
        return $postulant_record;
    }
}