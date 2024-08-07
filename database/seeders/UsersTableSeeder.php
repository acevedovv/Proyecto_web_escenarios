<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Obtener todos los roles
        $roles = DB::table('roles')->pluck('id_rol')->toArray();

        if (empty($roles)) {
            // Si no hay roles, no insertar ningún usuario
            $this->command->info('No hay roles disponibles para asignar a usuarios.');
            return;
        }

        // Insertar usuarios
        DB::table('users')->insert([
            [
                'nombre_usu' => 'Juan Pérez',
                'num_usu' => '12345678',
                'id_rol' => $roles[array_rand($roles)], // Selecciona un rol aleatorio
            ],
            [
                'nombre_usu' => 'Ana García',
                'num_usu' => '87654321',
                'id_rol' => $roles[array_rand($roles)], // Selecciona un rol aleatorio
            ],
            [
                'nombre_usu' => 'Luis Martínez',
                'num_usu' => '11223344',
                'id_rol' => $roles[array_rand($roles)], // Selecciona un rol aleatorio
            ],
        ]);
    }
}


