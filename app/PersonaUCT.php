<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonaUCT extends Model
{
    // use HasFactory;
    protected $connection = 'mysql_erp_integrado';
    protected $table = 'mae_persona';
    protected $primaryKey = 'persona';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'persona',
        'apellidopaterno',
        'apellidomaterno',
        'primernombre',
        'segundonombre',
        'nombrecompleto',
        'apellidopaternoacademico',
        'apellidomaternoacademico',
        'primernombreacademico',
        'segundonombreacademico',
        'nombrecompletoacademico',
        'varon',
        'fechanacimiento',
        'direccion',
        'email',
        'telefono',
        'celular',
        'tipodocumento',
        'estadocivil',
        'niveleducativo',
        'tipovia',
        'via',
        'numerovia',
        'tipozona',
        'zona',
        'pais',
        'departamentonacimiento',
        'provincianacimiento',
        'distritonacimiento',
        'departamento',
        'provincia',
        'distrito',
        'numerodocumento',
        'usuario',
        'password',
        'activo',
        'fecharegistro',
        'usuarioregistro',
        'cambiosuclave',
        'googlemail',
        'idgoogle',
        'aspirante',
        'tipodiscapacidad',
        'paisnacimiento',
        'tiposangre',
        'periodo_ingreso',
        'semestre_ingreso'
    ];
}
