<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Globalet extends Model
{
    protected $fillable = [
    	'ingenieria',
		'zona',
		'codigo_expediente',
		'solicitud_principal',
		'tipo',
		'subtipo',
		'descripcion_expediente',
		'potencia_solicitada',
		'tecnico_gestion_comercial',
		'tecnico_gestion_tecnica',
		'estado',
		'estado_solicitud',
		'fecha_asignacion',
		'plazo_legal_contestacion',
		'fecha_hora_apertura',
		'fecha_contestacion',
		'fecha_limite',
		'departamento',
    ];
}
