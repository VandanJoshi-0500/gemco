<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class,'collection','id');
    }
    
    public function productDetail(){
        return $this->hasOne(Product::class,'collection','id')->where('active',1)->latest();
    }
}
