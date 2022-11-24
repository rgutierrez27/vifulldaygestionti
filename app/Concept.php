<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    protected $connection   = 'mysql_erp_integrado';
    protected $table        = 'cob_concepto';
    protected $primaryKey   = 'concepto';
    public $timestamps      = false;
    protected $fillable     = [
        'tipoestructura',
        'descripcioncorta',
        'descripcioncompleta',
        'importe'
    ];

    public function detail()
    {
        return $this->hasMany(DetailConcept::class, 'concepto', 'concepto');
    }
}
