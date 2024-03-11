<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ItemCategories extends Model
{
    protected $table = 'Item_Categories';
    protected $primaryKey = 'idItem_Categories';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
}
