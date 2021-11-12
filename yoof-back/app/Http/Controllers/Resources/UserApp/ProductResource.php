<?php

namespace App\Http\Controllers\Resources\UserApp;

use App\Http\Controllers\Api\BaseApiController;
use App\Models\CategoryProperty;
use App\Models\Product;
use App\Models\Property;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductResource extends ProductRepository
{
    use BaseApiController;

    private $products;
    public function __construct(ProductRepository $products)
    {
        $this->products = $products;
    }

    public function index()
    {
        return $this->success($this->products->all());
    }

    public function groups()
    {
        return $this->success($this->products->groups());
    }

    public function getFilters(Request $request)
    {
        try {
            return $this->success($this->products->filters($request->post('category_name')));
        } catch (\Exception $exception) {
            return $this->error(['Что-то пошло не так']);
        }
    }

    public function searchByArgs(Request $request)
    {
        $products = parent::searchByArgs($request);
        return $this->success($products);
    }

    public function searchByModel(Request $request)
    {
        return $this->success(parent::searchByModel($request));
    }
}
