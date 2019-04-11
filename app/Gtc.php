<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gtc extends Model
{
    protected $fillable = [
    	'mes',
		'encargados_mes',
		'terminados_mes',
		'pendiente_datos',
		'pendiente_entrega',
		'fuera_plazo',
    ];
}
