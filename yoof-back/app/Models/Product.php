<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
