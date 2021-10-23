<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function searchArguments()
    {
        return $this->hasMany(SearchArguments::class);
    }

    public function productPropertries()
    {
        return $this->hasMany(Property::class);
    }

    public function __get($key)
    {
        if($key == 'products') {
            $categoryProp = $this;
            $props = $categoryProp->productPropertries;
            $products = [];
            foreach ($props as $prop) {
                $products[] = $prop->product_id;
            }
            return Product::find($products);
        }
        return parent::__get($key);
    }
}
