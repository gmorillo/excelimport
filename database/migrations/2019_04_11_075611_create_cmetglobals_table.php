<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmetglobalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmetglobals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mes')->nullable();
            $table->integer('encargados_mes')->nullable();
            $table->integer('terminados_mes')->nullable();
            $table->integer('pendiente_datos')->nullable();
            $table->integer('pendiente_entrega')->nullable();
            $table->integer('fuera_plazo')->nullable();
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
        Schema::dropIfExists('cmetglobals');
    }
}





