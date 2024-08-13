<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscenarioDeportivo extends Model
{
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'escenarios_deportivos';

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'fecha_dis',
        'nombre_esc',
        'id_fun',
    ];

    // La relación con la tabla funcionarios
    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'id_fun');
    }

    // La relación con la tabla reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_esc');
    }
}
