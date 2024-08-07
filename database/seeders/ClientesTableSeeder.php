<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los usuarios
        $usuarios = DB::table('users')->pluck('id_usu')->toArray();

        // Insertar clientes
        DB::table('clientes')->insert([
            [
                'nombre_cli' => 'Carlos Sánchez',
                'num_cli' => '555123456',
                'id_usu' => $usuarios[array_rand($usuarios)], // Selecciona un usuario aleatorio
            ],
            [
                'nombre_cli' => 'María Fernández',
                'num_cli' => '555654321',
                'id_usu' => $usuarios[array_rand($usuarios)], // Selecciona un usuario aleatorio
            ],
            [
                'nombre_cli' => 'Pedro López',
                'num_cli' => '555987654',
                'id_usu' => $usuarios[array_rand($usuarios)], // Selecciona un usuario aleatorio
            ],
        ]);
    }
}
