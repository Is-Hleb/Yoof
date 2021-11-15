<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use App\Models\SearchArguments;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{

    public function all()
    {
        return Product::all();
    }

    public function getByCategory(Category $category)
    {
        return Product::where('category_id', $category->id)->get();
    }

    public function categories()
    {
        return Category::where('gradation_name', '!=', 'invisible')->get();
    }


    public function groups()
    {
        $categories = Category::where('gradation_name', '!=', 'invisible')->get()->toArray();

        $output = [];
        foreach ($categories as $category) {
            $output[$category['gradation_name']][] = $category;
        }

        return $output;
    }

    public function filters($categoryName)
    {
        $category = Category::where('name', $categoryName)->first();
        $searchArguments = SearchArguments::where('category_id', $category->id)->get();
        $output = [];

        foreach ($searchArguments as $argument) {
            $output[$argument->categoryProperty->name][] = $argument;
        }
        return $output;
    }

    public function searchByArgs(Request $request)
    {
        $args = $request->post('args');
        $productProps = [];

        foreach ($args as $arg) {
            switch ($arg['value_type']) {
                case 'boolean':
                    $productProps = array_merge(
                        Property::where('name', $arg['name'])
                            ->where('category_property_id', $arg['category_property_id'])
                            ->get()
                            ->toArray(),
                        $productProps
                    );
                    break;
                case 'range':
                    $productProps = array_merge(
                        Property::where('value', '>=', $arg['from'])
                            ->where('value', '<=', $arg['to'])
                            ->where('category_property_id', $arg['category_property_id'])
                            ->get()
                            ->toArray(),
                        $productProps
                    );
                    break;
                case 'value':
                    $productProps = array_merge(
                        Property::where('value', 'like', '%'.$arg['value'].'%')
                            ->where('category_property_id', $arg['category_property_id'])
                            ->get()
                            ->toArray(),
                        $productProps
                    );
                    break;
            }
        }
        $products = [];
        foreach ($productProps as $productProp) {
            $product = Product::where('id', $productProp['product_id'])->first();
            $products[$product->id] = [
                'product' => $product->toArray(),
                'properties' => array_map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'value' => $item['value']
                    ];
                }, $product->properties->toArray()),
            ];
        }
        return $products;
    }

    public function searchByModel(Request $request)
    {
        $name = $request->post('name');
        if(empty($name)) return [];

        $products = Product::where([
            ['name', 'like', '%' .$name. '%'],
        ])->get();

        $output = [];
        $products = $products->filter(function ($product) {
            return $product->category->gradation_name != 'invisible';
        });

        foreach ($products as $product) {
            $output[$product->id] = [
                'product' => $product->toArray(),
                'properties' => array_map(function ($item) {
                    return [
                        'name' => $item['name'],
                        'value' => $item['value']
                    ];
                }, $product->properties->toArray()),
            ];
        }

        return $output;
    }
}
