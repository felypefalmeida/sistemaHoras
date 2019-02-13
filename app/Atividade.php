<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $table = 'atividade';

    Protected $fillable = [
    	'descricao','qtdhoras','situacao','arquivo','grupo_id','aluno_id','curso_id'

    ];

     public function aluno(){
        return $this->hasMany(Aluno::class);
    }
    public function curso(){
        return $this->hasMany(Curso::class);
    }
}
