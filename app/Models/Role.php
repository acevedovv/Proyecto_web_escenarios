<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // El nombre de la tabla asociada
    protected $table = 'roles';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre_rol',
        'desc_rol',
    ];

    // Define la relación con la tabla 'users'
    public function users()
    {
        return $this->hasMany(User::class, 'id_rol', 'id_rol');
    }
}
