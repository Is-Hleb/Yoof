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

}
