<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchArguments extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function categoryProperty()
    {
        return $this->belongsTo(CategoryProperty::class);
    }

}
