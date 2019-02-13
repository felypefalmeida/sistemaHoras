<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
   protected $table = 'instituicao';

    Protected $fillable = [
    	'nome','razaoSocial','cnpj'

    ];
}
