<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesTableSeeder extends Seeder
{
    /**
     * Sembrar la base de datos.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los usuarios
        $usuarios = DB::table('users')->pluck('id')->toArray(); // Usa 'id' en lugar de 'id_usu'

        if (empty($usuarios)) {
            // Si no hay usuarios, no insertar ningún cliente
            $this->command->info('No hay usuarios disponibles para asignar a clientes.');
            return;
        }

        // Insertar clientes
        DB::table('clientes')->insert([
            [
                'nombre_cli' => 'Carlos Sánchez',
                'num_cli' => '555123456',
                'user_id' => $usuarios[array_rand($usuarios)], // Usa 'user_id'
            ],
            [
                'nombre_cli' => 'María Fernández',
                'num_cli' => '555654321',
                'user_id' => $usuarios[array_rand($usuarios)], // Usa 'user_id'
            ],
            [
                'nombre_cli' => 'Pedro López',
                'num_cli' => '555987654',
                'user_id' => $usuarios[array_rand($usuarios)], // Usa 'user_id'
            ],
        ]);
    }
}


