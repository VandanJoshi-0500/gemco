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
        'color',
        'size',
        'hsn_code',
        'category',
        'subcategory',
        'collection',
        'secoundary_collection_1',
        'secoundary_collection_2',
        'price',
        'special_price',
        'tag_price',
        'quantity_stock',
        'long_description',
        'long_description_2',
        'long_description_3',
        'short_description',
        'sUrlkey',
        'sCountryName',
        'meta_title',
        'meta_description',
        'keyword',
        'gold_weight',
        'silver_weight',
        'diamond_weight',
        'diamond_grade',
        'gemstone_name_1',
        'gemstone_weight_1',
        'gemstone_name_2',
        'gemstone_weight_2',
        'gemstone_name_3',
        'gemstone_weight_3',
        'other_gemstones',
        'other_gemstone_weight',
        'fossil_name',
        'fossil_weight',
        'gross_weight',
        'total_gemstone_weight',
        'gemstone_type',
        'diamond_cut',
        'diamond_shape',
        'image_type',
        'image',
        'image2',
        'image3',
        'image4',
        'image5',
        'category_code',
        'tags',
        'metal_type',
        'status',
        'active',
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
