<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplicasTable extends Migration
{

    public function up()
    {
        Schema::create('replicas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tecnico_ede')->nullable();
            $table->string('provincia')->nullable();
            $table->string('departamento')->nullable();
            $table->string('tipo')->nullable();
            $table->string('gom')->nullable();
            $table->string('solicitud')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('fecha_encargo')->nullable();
            $table->string('ads_odm')->nullable();
            $table->string('protocolo_atlante')->nullable();
            $table->string('fecha_diseno_atlante')->nullable();
            $table->string('estado_atlante')->nullable();
            $table->string('fin_atlante')->nullable();
            $table->string('proyecto_agp')->nullable();
            $table->string('estado_agp')->nullable();
            $table->string('fin_agp')->nullable();
            $table->string('finca')->nullable();
            $table->string('tiempo_replica')->nullable();
            $table->string('lca')->nullable();
            $table->string('fecha_concluso')->nullable();
            $table->string('ing_estudio')->nullable();
            $table->longText('observaciones')->nullable();
            $table->string('plazos_atlante')->nullable();
            $table->string('plazos_replica')->nullable();
            $table->string('tecnico_nipsa')->nullable();
            $table->string('proyecto_nipsa')->nullable();
            $table->string('pendiente_endesa')->nullable();
            $table->string('plazo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('replicas');
    }
}


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    