<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Participant extends Authenticatable implements MustVerifyEmail
{
    protected $connection = 'mysql_erp_integrado';
    public $table = "aca_congreso_participantes";
    public $timestamps = true;
    protected $primaryKey = 'id_participante';
    protected $fillable = [
        'id_participante' ,
        'persona',
        'nombre_evento',
        'codigo_evento',
        'organization' ,
        'confirmed' ,
        'confirmation_code' ,
        'is_delete' ,
        'is_certificado',
        'created_at',
        'updated_at',
    ];
}
