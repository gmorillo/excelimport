<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graphicproject extends Model
{
    protected $fillable = [		
		'mes',
		'encargados_mes',
		'terminados_mes',
		'fuera_plazo',
		'pasado_ejecucion',
	];
}
