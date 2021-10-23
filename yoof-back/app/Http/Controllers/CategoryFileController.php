<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryProperty;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\UploadedFile;

class CategoryFileController extends Controller
{
    private $file, $category, $fPath;

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
        $this->category = Category::create([
            'name' => explode('.', $file->getClientOriginalName())[0],
        ]);
        $this->fPath = storage_path('app/uploads/categories/') . $file->getClientOriginalName();
        $this->file->storeAs('uploads/categories', $file->getClientOriginalName());
    }


    public function dateBaseFill()
    {
        $category = $this->category;
        $xls = \SimpleXLS::parse($this->fPath, false, true);
        $rows = $xls->rows(); // Получаем все строки XLS файла

        //#FILL CATEGORIES
        $data_to_fill = $rows[0];
        $data_to_fill = array_map(function ($item) use ($category) {
            return [
                'category_id' => $category->id,
                'name' => trim($item)
            ];
        }, $data_to_fill); // Читаем характеристики и сохраняем их в удобном формате

        $characteristics = array_filter($data_to_fill, function ($item) {
            return strlen($item['name']) > 0;
        }); // Убираем пустые характеристики

        CategoryProperty::insert($characteristics);
        $characteristics = CategoryProperty::where('category_id', $category->id)->get()->toArray();

        $products = [];
        for($i = 1; $i < sizeof($rows); $i++) {
            $products[] = [
              'category_id' => $category->id
            ];
        }

        Product::insert($products);
        $insertLimit = 1000;
        $propertiesToInsert = [];
        $products = Product::where('category_id', $category->id)->get();
        for ($i = 1; $i < sizeof($rows); $i++) { // Начинаем идти по строкам
            $cur_row = $rows[$i]; // Текущая строка
            $product = $products[$i - 1];

            $iteration = 0; // Отмечаем столбец, изначально для строки -- это 0
            foreach ($characteristics as $characteristic) { // Идём по характеристикам, столбцы совпадают с итерацией цикла
                $value = $cur_row[$iteration++];
                if (!strlen($value)) {
                    continue;
                }
                $propertiesToInsert[] = [ // Создаём свойста продукта
                    'name' => trim(str_replace(' ', ' ', $characteristic['name'])), // Название текущей характеристики
                    'value' => trim(str_replace(' ', ' ', $value)), // Значение столбца
                    'product_id' => $product->id,
                    'category_property_id' => $characteristic['id'],
                ];
                if($insertLimit-- <= 0) {
                    Property::insert($propertiesToInsert);
                    $propertiesToInsert = [];
                    $insertLimit = 1000;
                }
            }
            if($insertLimit > 0) {
                Property::insert($propertiesToInsert);
                $propertiesToInsert = [];
                $insertLimit = 1000;
            }
        }
    }

}
