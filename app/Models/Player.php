<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';
    protected $primaryKey = 'player_id';
    protected $fillable = [
        'username', 
        'email', 
        'password_hash', 
        'gems', 
        'stamina', 
        'account_create',
        'last_login'
    ];
    public $timestamps = false;
}
