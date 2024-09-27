<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asumiendo que ya existen usuarios en la base de datos
        $usuarios = DB::table('users')->pluck('id')->toArray();

        DB::table('funcionarios')->insert([
            [
                'nombre_fun' => 'Pedro Gómez',
                'user_id' => $usuarios[array_rand($usuarios)], // Selecciona un usuario aleatorio
            ],
            [
                'nombre_fun' => 'Laura Martínez',
                'user_id' => $usuarios[array_rand($usuarios)],
            ],
            [
                'nombre_fun' => 'Carlos López',
                'user_id' => $usuarios[array_rand($usuarios)],
            ],
        ]);
    }
}

