<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function categoryProperty()
    {
        return $this->belongsTo(CategoryProperty::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
