<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphicprojects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes')->nullable();
            $table->integer('encargados_mes')->nullable();
            $table->integer('terminados_mes')->nullable();
            $table->integer('fuera_plazo')->nullable();
            $table->integer('proyectos_pendientes')->nullable();
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
        Schema::dropIfExists('graphicprojects');
    }
}
