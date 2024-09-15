<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // La tabla asociada al modelo
    protected $table = 'funcionarios';

    // Los atributos que se pueden asignar masivamente
    protected $fillable = [
        'nombre_fun',
        'user_id',
    ];

    // La relación con la tabla usuarios
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // La relación con la tabla escenarios_deportivos
    public function escenariosDeportivos()
    {
        return $this->hasMany(EscenarioDeportivo::class, 'id_fun');
    }

    // Especifica la clave primaria
    protected $primaryKey = 'id_fun';
}
