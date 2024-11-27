<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'category_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getParentPathAttribute()
    {
        if ($this->category_id) {
            $parent = $this->parent;
            return $parent->parent_path . " > " . $this->name;
        }
        return $this->name;
    }
}
