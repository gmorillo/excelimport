<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobaletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globalets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ingenieria')->nullable();
            $table->string('zona')->nullable();
            $table->string('codigo_expediente')->nullable();
            $table->string('solicitud_principal')->nullable();
            $table->string('tipo')->nullable();
            $table->string('subtipo')->nullable();
            $table->string('descripcion_expediente')->nullable();
            $table->string('potencia_solicitada')->nullable();
            $table->string('tecnico_gestion_comercial')->nullable();
            $table->string('tecnico_gestion_tecnica')->nullable();
            $table->string('estado')->nullable();
            $table->string('estado_solicitud')->nullable();
            $table->string('fecha_asignacion')->nullable();
            $table->string('plazo_legal_contestacion')->nullable();
            $table->string('fecha_hora_apertura')->nullable();
            $table->string('fecha_contestacion')->nullable();
            $table->string('fecha_limite')->nullable();
            $table->string('departamento')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('globalets');
    }
}
