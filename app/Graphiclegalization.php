<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graphiclegalization extends Model
{
    protected $fillable = [		
		'mes',
		'encargados_mes',
		'terminados_mes',
		'fuera_plazo',
		'pasado_ejecucion',
		'administracion',
		'contrata',
		'endesa',
		'ingenieria',
	];
}

