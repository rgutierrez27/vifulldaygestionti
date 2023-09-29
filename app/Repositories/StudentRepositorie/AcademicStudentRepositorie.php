<?php

namespace App\Repositories\StudentRepositorie;

use Exception;
use Illuminate\Support\Facades\DB;

class AcademicStudentRepositorie{
    
    public static function getCoursesBySemester($student_code, $person_code, $structure_code, $semester){
        $courses = DB::connection('mysql_erp_integrado')
            ->table('aca_rendimiento AS aca')
            ->select([
                'aca.sede',
                'aca.semestre',
                'aca.curricula',
                'aca.estructura',
                'aca.curso',
                'cur.nombre AS nombre_curso',
                'aca.cursoorigen',
                'curo.nombre AS nombre_curso_origen',
                'aca.sede',
                'aca.seccion',
                'aca.grupo',
                'aca.sede',
                'aca.version',
                'aca.modalidad'
            ])
            ->join('aca_curso AS cur', function($join){
                $join->on('aca.estructura', '=', 'cur.estructura');
                $join->on('aca.curricula', '=', 'cur.curricula');
                $join->on('aca.curso', '=', 'cur.curso');
            })
            ->leftJoin('aca_curso AS curo', function($join){
                $join->on('aca.estructuraorigen', '=', 'curo.estructura');
                $join->on('aca.curriculaorigen', '=', 'curo.curricula');
                $join->on('aca.cursoorigen', '=', 'curo.curso');
            })
            ->where('aca.alumno', $student_code)
            ->where('aca.persona', $person_code)
            ->where('aca.estructura', $structure_code)
            ->where('aca.semestre', $semester)
            ->whereIn('aca.tipoaprobado', ['M','R'])
            ->get();

        if(!$courses)
            throw new Exception("Alumno $student_code con código persona $person_code error al encontrar cursos matriculados.");

        return $courses;
    }

    public static function getAttendancesByCourse($data){
        $attendances = DB::connection('mysql_erp_integrado')
            ->table('aca_cursoprogramadosesion AS a')
            ->join('aca_asistencia as asis', 'a.sesiones', '=', 'asis.sesiones')
            ->where('a.sede', $data['sede'])
            ->where('a.semestre', $data['semestre'])
            ->where('a.curricula', $data['curricula'])
            ->where('a.estructura', $data['estructura'])
            ->where('a.curso', $data['curso'])
            ->where('a.seccion', $data['seccion'])
            ->where('a.grupo', $data['grupo'])
            ->where('a.version', $data['version'])
            ->where('a.modalidad', $data['modalidad'])
            ->where('asis.alumno', $data['alumno'])
            ->get('asis.*');

        if(!$attendances)
            throw new Exception("Alumno $data[alumno] error al encontrar asistencias.");

        return $attendances;
    }
}