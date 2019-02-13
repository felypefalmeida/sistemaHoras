<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';

    Protected $fillable = [
    	'descricao','qtdHoras','maxHoras','curso_id'

    ];
}
