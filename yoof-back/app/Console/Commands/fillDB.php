<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\CategoryProperty;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Console\Command;

class fillDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command populates db using data from xls files in database/source_data& Executing near 2 minutes';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function makeTele() // Создаёт поля для категории телевизоров
    {
        $category = Category::create([
            'name' => 'Телевизоры',
        ]); // Создаём категорию

        $xls = \SimpleXLS::parse(database_path('source_data/Tele.xls'), false, true);
        $rows = $xls->rows(); // Получаем все строки XLS файла

        //#FILL CATEGORIES
        $data_to_fill = $rows[0];
        $data_to_fill = array_map(function ($item) use ($category) {
            return [
                'category_id' => $category->id,
                'name' => $item
            ];
        }, $data_to_fill); // Читаем характеристики и сохраняем их в удобном формате

        $characteristics = array_filter($data_to_fill, function ($item) {
            return strlen($item['name']) > 0;
        }); // Убираем пустые характеристики

        CategoryProperty::insert($characteristics);
        $characteristics = CategoryProperty::where('category_id', $category->id)->get()->toArray();

        for ($i = 1; $i < sizeof($rows); $i++) { // Начинаем идти по строкам
            $cur_row = $rows[$i]; // Текущая строка
            $product = Product::create([
                'name' => 'name',
                'url' => $cur_row[0],
                'category_id' => $category->id,
            ]); // Создаём продукт, чтобы получить его id в БД

            $iteration = 0; // Отмечаем столбец, изначально для строки -- это 0
            foreach ($characteristics as $characteristic) { // Идём по характеристикам, столбцы совпадают с итерацией цикла
                $value = $cur_row[$iteration++];
                if (!strlen($value)) {
                    continue;
                }
                $properties = [ // Создаём свойста продукта
                    'name' => $characteristic['name'], // Название текущей характеристики
                    'value' => $value, // Значение столбца
                    'product_id' => $product->id,
                    'category_property_id' => $characteristic['id'],
                ];
                Property::insert($properties);
            }
        }
    }

    public function createStirka()
    {
        $category = Category::create([
            'name' => 'Стиральные машины',
        ]);

        $xls = \SimpleXLS::parse(database_path('source_data/full_stirka.xls'), false, true);
        $rows = $xls->rows();

        //#FILL CATEGORIES
        $data_to_fill = $rows[0];
        $data_to_fill = array_map(function ($item) use ($category) {
            return [
                'category_id' => $category->id,
                'name' => $item
            ];
        }, $data_to_fill);

        $characteristics = array_filter($data_to_fill, function ($item) {
            return strlen($item['name']) > 0;
        });

        CategoryProperty::insert($characteristics);
        $characteristics = CategoryProperty::where('category_id', $category->id)->get()->toArray();

        for ($i = 1; $i < sizeof($rows); $i++) {
            $properties_to_insert = [];

            $cur_row = $rows[$i];
            $product = Product::create([
                'name' => 'name',
                'url' => $cur_row[0],
                'category_id' => $category->id,
            ]);

            $iteration = 0;
            foreach ($characteristics as $characteristic) {
                if ($characteristic['name'] == "Особенности" && strlen($cur_row[$iteration])) { // Если многоуровневая характеристика

                    $string = $cur_row[$iteration++]; // Берём сериализованную строку
                    $string = str_replace("[", "", $string);
                    $string = str_replace("]", "", $string);
                    $string = str_replace("'", "", $string);
                    $properties = explode(",", $string); // После форматирования получаем массив строк

                    foreach ($properties as $property) { // Идем по полученному массиву
                        if (strpos($property, "программ")) { // Если находим программ, то нужно оторвать от строки число
                            $value = intval($property[strlen($property) - 1]) + intval($property[strlen($property) - 2]) * 10; // Переводим 2 последних символа в число

                            $name = substr($property, 0, strlen($property) - 2);
                            $category_property = CategoryProperty::where('name', $name)->first();
                            if(!$category_property) {
                                $category_property = CategoryProperty::create([
                                    'name' => $name,
                                    'category_id' => $category->id
                                ]);
                            }

                            $properties_to_insert[] = [
                                'value' => trim($value), // На всякий пытаемся убрать лишние пробелы
                                'name' => trim($name),
                                'category_property_id' => $category_property->id,
                                'product_id' => $product->id,
                            ];
                            continue;
                        } // Если не нашли программ, то свойство типа bool

                        $name = trim($property);
                        $category_property = CategoryProperty::where('name', $name)->first();
                        if(!$category_property) {
                            $category_property = CategoryProperty::create([
                                'name' => $name,
                                'category_id' => $category->id
                            ]);
                        }

                        $properties_to_insert[] = [
                            'name' => $name,
                            'value' => true,
                            'category_property_id' => $category_property->id,
                            'product_id' => $product->id,
                        ];
                    }
                } else { // Если вообще другая характеристика, пишем её
                    $value = trim($cur_row[$iteration++]);
                    if (!strlen($value)) {
                        continue;
                    }
                    $properties_to_insert[] = [
                        'name' => trim($characteristic['name']),
                        'value' => $value,
                        'category_property_id' => $characteristic['id'],
                        'product_id' => $product->id,
                    ];
                }
            }
            Property::insert($properties_to_insert);
        }
    }

    public function deleteTrash()
    {
        $props = CategoryProperty::all();
        foreach ($props as $prop) {
            $prodProps = $prop->productPropertries();
            if (!$prodProps->count()) {
                CategoryProperty::destroy($prop->id);
            }
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        print_r('############## RUN TELE FUNCTION ###############' . PHP_EOL);
        // $this->makeTele();
        print_r('############## RUN STIRKA FUNCTION ###############' . PHP_EOL);
        $this->createStirka();
        print_r('############## DELETE TRASH ###############' . PHP_EOL);
        $this->deleteTrash();
        print_r('############## POPULATES COMPLITED ###############' . PHP_EOL);


        return 0;
    }
}
