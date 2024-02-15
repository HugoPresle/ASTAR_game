<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Monster extends Model
{
    protected $table = 'Monster';
    protected $primaryKey = 'idMonster';
    protected $fillable = [
        'name',
        'description',
        'image',
        'base_attack',
        'base_defense',
        'base_speed',
        'base_hp',
        'base_rarity'
    ];
    public function monsterTypes()
    {
        return $this->hasMany(Monster_Type::class, 'monster_id');
    }
    public function rarity()
    {
        return $this->belongsTo(Rarity::class, 'base_rarity');
    }
}
