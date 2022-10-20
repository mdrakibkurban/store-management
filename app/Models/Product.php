<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function product_stocks(){
        return $this->hasMany(ProductSizeStock::class);
    }


    protected $appends = ['product_image'];

    public function getProductImageAttribute(){
        return asset("uploads/products/$this->image");
    }
}
