<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // El nombre de la tabla asociada
    protected $table = 'roles';
 
    // La clave primaria de la tabla
    protected $primaryKey = 'id_rol';

    // Indica si el ID de la tabla se incrementa automáticamente
    public $incrementing = true;
    
    // El tipo de la clave primaria (generalmente 'int' o 'string')
    protected $keyType = 'int';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre_rol',
        'desc_rol',
    ];

    // Los atributos que deberían ser ocultados para arrays
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Define la relación con la tabla 'users'
    public function users()
    {
        return $this->hasMany(User::class, 'id_rol', 'id_rol');
    }
}
