<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyLogin;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
       'login', 'password','nivelAcesso'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
