<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'product_id',
        'category_id',
        'name',
        'value'
    ];
}
