<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Globalcalidadet extends Model
{
    protected $fillable = [
    	'mes',
		'encargados_mes',
		'terminados_mes',
		'pendiente_datos',
    ];
}
