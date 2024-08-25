<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Escenarios_deportivosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asumiendo que ya existen funcionarios en la base de datos
        $funcionarios = DB::table('funcionarios')->pluck('id_fun')->toArray();

        DB::table('escenarios_deportivos')->insert([
            [
                'fecha_dis' => Carbon::create('2024', '09', '01'),  // fecha de disponibilidad
                'nombre_esc' => 'Estadio Central',
                'id_fun' => $funcionarios[array_rand($funcionarios)], // Selecciona un funcionario aleatorio
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha_dis' => Carbon::create('2024', '10', '01'),
                'nombre_esc' => 'Cancha de Baloncesto',
                'id_fun' => $funcionarios[array_rand($funcionarios)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha_dis' => Carbon::create('2024', '11', '01'),
                'nombre_esc' => 'Pista de Atletismo',
                'id_fun' => $funcionarios[array_rand($funcionarios)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


