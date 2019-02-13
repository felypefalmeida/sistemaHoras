<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordenador extends Model
{
     protected $table = 'coordenador';

    Protected $fillable = [
    	'cpf','nome','email','senha','usuario_id'

    ];

	public function usuario(){
        return $this->hasMany(Usuario::class);
    }

     public function atividades_aluno(){
    	return $this->hasMany(Atividade::class, 'aluno_id');
    }
}
