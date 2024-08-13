<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Asumiendo que ya existen clientes y escenarios deportivos en la base de datos
        $clientes = DB::table('clientes')->pluck('id_cli')->toArray();
        $escenariosDeportivos = DB::table('escenarios_deportivos')->pluck('id_esc')->toArray();

        DB::table('reservas')->insert([
            [
                'fecha_res' => Carbon::now()->subDays(10),  // fecha de reserva
                'fecha_dev' => Carbon::now()->subDays(5),   // fecha de devolución
                'id_cli' => $clientes[array_rand($clientes)], // Selecciona un cliente aleatorio
                'id_esc' => $escenariosDeportivos[array_rand($escenariosDeportivos)], // Selecciona un escenario deportivo aleatorio
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha_res' => Carbon::now()->subDays(8),
                'fecha_dev' => Carbon::now()->subDays(3),
                'id_cli' => $clientes[array_rand($clientes)],
                'id_esc' => $escenariosDeportivos[array_rand($escenariosDeportivos)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fecha_res' => Carbon::now()->subDays(7),
                'fecha_dev' => Carbon::now()->subDay(),
                'id_cli' => $clientes[array_rand($clientes)],
                'id_esc' => $escenariosDeportivos[array_rand($escenariosDeportivos)],
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
