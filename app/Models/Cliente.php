<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // El nombre de la tabla asociada
    protected $table = 'clientes';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre_cli',
        'num_cli',
        'id_usu',
    ];

    // Define la relación con la tabla 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usu', 'id_usu');
    }
}

