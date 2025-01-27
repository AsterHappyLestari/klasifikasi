<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    protected $table = 'tb_login';
    protected $primaryKey = 'id_admin';
    protected $fillable = [
        'username', 'email', 'password',
    ];

    public $timestamps = false;

}

