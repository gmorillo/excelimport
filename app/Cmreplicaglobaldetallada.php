<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmreplicaglobaldetallada extends Model
{
    protected $fillable = [
    	'tipo',
		'mes',
		'encargados_mes',
		'terminados_mes',
		'fuera_plazo',
    ];
}
