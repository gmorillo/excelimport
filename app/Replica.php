<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replica extends Model
{
    protected $fillable = [
		'tecnico_ede',
		'provincia',
		'departamento',
		'tipo',
		'gom',
		'solicitud',
		'descripcion',
		'fecha_encargo',
		'ads_odm',
		'protocolo_atlante',
		'fecha_diseno_atlante',
		'estado_atlante',
		'fin_atlante',
		'proyecto_agp',
		'estado_agp',
		'fin_agp',
		'finca',
		'tiempo_replica',
		'lca',
		'fecha_concluso',
		'ing_estudio',
		'observaciones',
		'plazos_atlante',
		'plazos_replica',
		'tecnico_nipsa',
		'proyecto_nipsa',
		'pendiente_endesa',
		'plazo',
    ];
}
