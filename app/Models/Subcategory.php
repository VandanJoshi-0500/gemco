<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'name',
        'slug',
        'meta_text',
        'meta_description',
        'keywords',
        'status',
    ];

    // Define the relationship between SubCategory and Category (if necessary)
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
