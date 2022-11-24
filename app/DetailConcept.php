<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailConcept extends Model
{
    protected $connection   = 'mysql_erp_integrado';
    protected $table        = 'cob_concepto_detalle';
    public $timestamps      = false;
    protected $fillable     = [
        'concepto',
        'descripcion',
        'importe'
    ];
}
