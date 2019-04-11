<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectlegalizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectlegalizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('provincia')->nullable();
            $table->string('codigo_nipsa')->nullable();
            $table->string('tarea_proyecto')->nullable();
            $table->string('fecha_encargo')->nullable();
            $table->string('fecha_entrega')->nullable();
            $table->longText('titulo_encargo')->nullable();
            $table->string('tecnico_endesa')->nullable();
            $table->string('tipo_trabajo')->nullable();
            $table->string('poblacion')->nullable();
            $table->string('codigo_centro')->nullable();
            $table->string('propiedad')->nullable();
            $table->string('tipo')->nullable();
            $table->string('legal')->nullable();
            $table->string('departamento')->nullable();
            $table->string('solicitud_nnss')->nullable();
            $table->string('trabajo_gom')->nullable();
            $table->string('organismos_implicados')->nullable();
            $table->string('tarea_lca')->nullable();
            $table->string('fecha_generacion')->nullable();
            $table->string('tramite_gom')->nullable();
            $table->string('expte_industria')->nullable();
            $table->string('pasado_ejecucion')->nullable();
            $table->string('estado_tarea')->nullable();
            $table->string('cfo')->nullable();
            $table->string('apm')->nullable();
            $table->string('motivo_paralizacion')->nullable();
            $table->longText('observaciones')->nullable();
            $table->longText('desistimiento')->nullable();
            $table->string('expediente_finalizado')->nullable();
            $table->string('fecha_favorable')->nullable();
            $table->string('estado_tramitacion')->nullable();
            $table->string('dias_plazo')->nullable();
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
        Schema::dropIfExists('projectlegalizations');
    }
}






































































