<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscenarioDeportivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_08_12_150403_create_escenario_deportivo_table.php
        Schema::create('escenario_deportivo', function (Blueprint $table) {
            $table->id();
========
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('id_fun');
            $table->string('nombre_fun');
            $table->unsignedBigInteger('user_id');
>>>>>>>> acefae8484cae0abab5b5caef322ba10999bd5fe:database/migrations/2014_10_14_90000_create_funcionarios_table.php
            $table->timestamps();
            // Definir la relación con la tabla usuarios
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escenario_deportivo');
    }
}
