<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // El nombre de la tabla asociada
    protected $table = 'clientes';
    protected $primaryKey = 'id_cli';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre_cli',
        'num_cli',
        'id_usu',
    ];

    // Los atributos que deberían ser ocultados para arrays
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Define la relación con la tabla 'users'
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usu', 'id_usu');
    }
}

