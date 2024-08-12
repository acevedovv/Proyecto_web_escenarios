<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escenario_Deportivo extends Model
{
    use HasFactory;
        // El nombre de la tabla asociada
        protected $table = 'escenario_deportivo';

        // Los atributos que son asignables en masa
        protected $fillable = [
            'id_esc_dep',
            'fecha_esc_dep',
            'nombre_esc_dep',   
        ];
    
        // Los atributos que deberían ser ocultados para arrays
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
    
        // Define la relación con la tabla 'users'
        public function funcionario()
        {
            return $this->belongsTo(Funcionario::class, 'id_func', 'id_fun');
        }
}
