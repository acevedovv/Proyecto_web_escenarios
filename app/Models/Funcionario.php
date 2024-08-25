<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

<<<<<<< HEAD
        // El nombre de la tabla asociada
        protected $table = 'funcionario';

        // Los atributos que son asignables en masa
        protected $fillable = [
            'id_fun',
            'nom_fun',
        ];
    
        // Los atributos que deberían ser ocultados para arrays
        protected $hidden = [
            'created_at',
            'updated_at',
        ];
    
        // Define la relación con la tabla 'users'
        public function users()
        {
            return $this->hasMany(User::class, 'id_fun', 'id_fun');
        }
=======
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
>>>>>>> acefae8484cae0abab5b5caef322ba10999bd5fe
}
