<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;

interface ProductRepositoryInterface {
    public function all();
    public function getByCategory(Category $category);
    public function categories();
    public function groups();
}
