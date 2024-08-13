<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'reservas';
    protected $primaryKey = 'id_res';

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'fecha_res',
        'fecha_dev',
        'id_cli',
        'id_esc',
    ];

    protected $dates = ['fecha_res', 'fecha_dev'];

    // La relación con la tabla clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cli', 'id_cli');
    }

    // La relación con la tabla escenarios_deportivos
    public function escenarioDeportivo()
    {
        return $this->belongsTo(EscenarioDeportivo::class, 'id_esc', 'id_esc');
    }
}
