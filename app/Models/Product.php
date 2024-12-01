<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'SKU',
        'sale_price',
        'purchased_price',
        'category_id',
        'brand_id',
        'unit_id',
        'is_active'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_media(){
        return $this->hasMany(ProductMedia::class);
    }
}
