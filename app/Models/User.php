<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    // El nombre de la tabla asociada
    protected $table = 'users';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre_usu',
        'num_usu',
        'email',
        'password',
        'id_rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Define la relación con la tabla 'roles'
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_rol', 'id_rol');
    }

    // Define la relación con la tabla 'clientes'
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_usu', 'id_usu');
    }

    public function reservas()
{
    return $this->hasMany(Reserva::class);
}
}
