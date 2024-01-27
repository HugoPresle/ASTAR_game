<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Player extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'Player';
    protected $primaryKey = 'idPlayer';
    protected $fillable = [
        'email' ,
        'password' ,
        'username',
        'img',
        'lvl',
        'xp',
        'money',
        'gem',
        'stamina',
        'create_time',
        'last_login'
    ];
    public $timestamps = false;
}
