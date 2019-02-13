<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table = 'curso';

    Protected $fillable = [
    	'nome','horas','coordenador_id','instituicao_id'

    ];
}
