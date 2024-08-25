<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<<< HEAD:database/migrations/2024_08_12_145727_create_funcionario_table.php
class CreateFuncionarioTable extends Migration
========
return new class extends Migration
>>>>>>>> acefae8484cae0abab5b5caef322ba10999bd5fe:database/migrations/2014_10_12_100000_create_password_resets_table.php
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<<< HEAD:database/migrations/2024_08_12_145727_create_funcionario_table.php
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
========
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
>>>>>>>> acefae8484cae0abab5b5caef322ba10999bd5fe:database/migrations/2014_10_12_100000_create_password_resets_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<<< HEAD:database/migrations/2024_08_12_145727_create_funcionario_table.php
        Schema::dropIfExists('funcionario');
========
        Schema::dropIfExists('password_resets');
>>>>>>>> acefae8484cae0abab5b5caef322ba10999bd5fe:database/migrations/2014_10_12_100000_create_password_resets_table.php
    }
};
