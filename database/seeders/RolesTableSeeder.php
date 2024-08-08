<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'nombre_rol' => 'Administrador',
                'desc_rol' => 'Rol con todos los permisos'
            ],
            [
                'nombre_rol' => 'Editor',
                'desc_rol' => 'Rol con permisos para editar contenido'
            ],
            [
                'nombre_rol' => 'Usuario',
                'desc_rol' => 'Rol con permisos básicos para usar la aplicación'
            ],
        ]);
    }
}
