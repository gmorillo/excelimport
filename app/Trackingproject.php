<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trackingproject extends Model
{
    protected $fillable = [
		'identificador_ede',
		'trabajo_gom',
		'identificador_ingenieria',
		'lca',
		'descripcion',
		'topologia',
		'tipo',
		'municipio',
		'fecha_pedido',
		'fecha_entrega',
		'plazo',
		'provincia',
	];
}
