<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
<<<<<<< HEAD
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
=======

    // La tabla asociada al modelo
    protected $table = 'reservas';
    protected $primaryKey = 'id_res';

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'fecha_res',
        'fecha_dev',
        'user_id',
        'id_esc',
    ];

    protected $dates = ['fecha_res', 'fecha_dev'];

    // La relación con la tabla clientes
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // La relación con la tabla escenarios_deportivos
    public function escenarioDeportivo()
    {
        return $this->belongsTo(EscenarioDeportivo::class, 'id_esc', 'id_esc');
    }
>>>>>>> acefae8484cae0abab5b5caef322ba10999bd5fe
}
