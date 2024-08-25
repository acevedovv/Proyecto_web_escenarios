<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscenariosDeportivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escenarios_deportivos', function (Blueprint $table) {
            $table->id('id_esc');
            $table->date('fecha_dis');
            $table->string('nombre_esc');
            $table->unsignedBigInteger('id_fun');
            $table->timestamps();
            
            // Definir la relación con la tabla funcionarios
            $table->foreign('id_fun')->references('id_fun')->on('funcionarios');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escenarios_deportivos');
    }
}
