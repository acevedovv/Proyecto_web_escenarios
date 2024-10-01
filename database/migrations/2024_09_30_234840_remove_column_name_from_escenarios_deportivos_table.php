<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnNameFromEscenariosDeportivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('escenarios_deportivos', function (Blueprint $table) {
            $table->dropColumn('id_fun'); // Cambia 'column_name' por el nombre de la columna que quieres eliminar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('escenarios_deportivos', function (Blueprint $table) {
            $table->string('id_fun'); // Cambia 'string' y el tipo según sea necesario
        });
    }

}
