<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmreplicaglobal extends Model
{
    protected $fillable = [
    	'mes',
		'encargados_mes',
		'terminados_mes',
		'pendiente_entrega',
		'fuera_plazo',
    ];
}
