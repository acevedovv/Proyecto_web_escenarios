<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
        // El nombre de la tabla asociada
        protected $table = 'reserva';

        // Los atributos que son asignables en masa
        protected $fillable = [
            'id_reser',
            'fecha_res',
            'fecha_dev',
        ];
    
        // Los atributos que deberían ser ocultados para arrays
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
    
        // Define la relación con la tabla 'escenario_deportivo'
        public function escenario_deportivo()
        {
            return $this->hasMany(Escenario_Deportivo::class, 'id_esc_dep', 'id_esc_dep');
        }
            // Define la relación con la tabla 'clientes'
            
        public function clientes()
        {
            return $this->hasMany(Cliente::class, 'id_reser', 'id_reser');
        }
}
