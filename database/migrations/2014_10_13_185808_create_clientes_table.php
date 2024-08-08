<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cli');
            $table->string('nombre_cli');
            $table->string('num_cli');
            $table->unsignedBigInteger('id_usu');
            $table->timestamps();

            // Definir la relación con la tabla roles
            $table->foreign('id_usu')->references('id_usu')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
