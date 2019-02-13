<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'aluno';

    Protected $fillable = [
    	'matricula','nome','email','senha','situacao','usuario_id','curso_id'

    ];


    public function atividades_aluno(){
    	return $this->hasMany(Atividade::class, 'aluno_id');
    }
    

    

}
