<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monster_Type extends Model
{
    use HasFactory;

    protected $table = 'Monster_Type_Relation';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'monster_id',
        'type_id',
    ];

    public function monster()
    {
        return $this->belongsTo(Monster::class, 'monster_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}