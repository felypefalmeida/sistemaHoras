<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';

    Protected $fillable = [
    	'id','login','senha','nivelAcesso'
    ];

    public function coordenador(){
        return $this->hasMany(Coordenador::class);
    }
}
