<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class subcollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_name',
        'secoundary_collection_1',
        'secoundary_collection_2',
        'slug',
        'meta_text',
        'meta_description',
        'keywords',
        'status',
    ];

    // Define the relationship between SubCategory and Category (if necessary)
    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    protected static function booted()
    {
        static::saving(function ($subcollection) {
            // Get the collection name based on the collection_id
            $collection = \App\Models\Collection::find($subcollection->collection_id);
            if ($collection) {
                $subcollection->collection_name = $collection->name; // Set the collection_name
            }
        });
    }

}
