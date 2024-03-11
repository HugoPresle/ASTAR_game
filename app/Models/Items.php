<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemStats;
use App\Models\ItemCategories;

class Items extends Model
{
    use HasFactory;

    protected $table = 'Item';
    protected $primaryKey = 'idItem';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'item_stats',
        'item_categories',
        'item_rarity',
        'image',
        'price',
    ];

    public function itemStats()
    {
        return $this->belongsTo(ItemStats::class, 'item_stats');
    }

    public function itemCategories()
    {
        return $this->belongsTo(ItemCategories::class, 'item_categories');
    }

    public function itemRarity()
    {
        return $this->belongsTo(Rarity::class, 'item_rarity');
    }
}
