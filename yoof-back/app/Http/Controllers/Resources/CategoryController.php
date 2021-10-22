<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\CategoryFileController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProperty;
use App\Models\Product;
use App\Models\Property;
use App\Models\SearchArguments;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\String_;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::all();
        $export = [];
        foreach ($categories as $category) {
            $propsBefore = $category->categoryProperties;
            $props = [];
            foreach ($propsBefore as $prop) {
                $props[] = array_merge($prop->toArray(), [
                    'searchArguments' => $prop->searchArguments,
                    'productsCount' => Property::where('category_property_id', $prop->id)->count(),
                ]);
            }

            $export[$category->id] = [
                'category' => array_merge($category->toArray(), [
                    'productsCount' => Product::where('category_id', $category->id)->count(),
                ]),
                'properties' => $props
            ];
        }
        return \response($export);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('category');
        if($file->getClientOriginalExtension() !== 'xls') {
            return \response([
                'err' => 'Не верное разрешение',
            ], 415);
        }
        $fileAction = new CategoryFileController($file);
        try {
            $fileAction->dateBaseFill();
            return \response(['code' => 'success']);
        } catch (\Exception $exception) {
            return \response([
               'err' => $exception->getMessage()
            ], 415);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $updateData = $requestData['data'];
        try {
            switch ($requestData['type']) {
                case 'category':
                    Category::find($id)->update($updateData);
                    break;
                case 'property':
                    CategoryProperty::find($id)->update($updateData);
                    break;
                case 'searchArgument':
                    SearchArguments::find($id)->update($updateData);
                    break;
                default:
                    return \response([
                        'code' => 'err'
                    ]);
            }
            return \response([
                'code' => 'success',
            ]);
        } catch (\Exception $exception) {
            return \response([
                'code' => 'err',
                'data' => $exception->getMessage()
            ]);
        }
    }


    public function destroy(Request $request, $id)
    {
        $type = $request->get('type');
        try {
            switch ($type) {
                case 'searchArgument':
                    SearchArguments::destroy($id);
                    break;
                case 'category':
                    Category::destroy($id);
                    break;
                case 'property':
                    CategoryProperty::destroy($id);
                    break;
                default:
                    return \response([
                        'code' => 'err',
                    ]);
            }
            return \response([
                'code' => 'success',
            ]);
        } catch (\Exception $exception) {
            return \response([
                'code' => 'err',
                'data' => $exception->getMessage(),
            ]);
        }
    }
}
