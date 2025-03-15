<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'sku',
        'long_description',
        'long_description2',
        'long_description3',
        'short_description',
        'category',
        'mainstone',
        'collection',
        'show_on_web',
        'quantity_stock',
        'quantity_memo',
        'price',
        'created_at',
        'updated_at',
        'showondibs',
        'showonbluefly',
        'showonetsy',
        'showoncustom1',
        'showoncustom2',
        'showoncustom3',
        'donotlist',
        'ebay',
        'amazon',
        'artisan',
        'socheec',
        'image',
        'thumbnail_url',
        'metal_type',
        'tag_price',
        'special_price',
        'inventory',
        'status',
    ];
    
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category', 'id');
    }

    public function collections()
    {
        return $this->belongsTo(Collection::class, 'collection', 'id');
    }
}
