<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

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
}
