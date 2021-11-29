<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UPDDocsController extends Controller
{
    use BaseApiController;

    public function index(Request $request) {

        $path = "uploads/{$request->user()->role}s/{$request->user()->id}/docs/";
        $fileName = $request->post('type')
            . '_' . str_replace('.', '', str_replace(' ', '_', $request->user()->data->company_name))
            . '.' . $request->file('upload')->extension();

        $file = $request->file('upload');

        $validator = Validator::make($request->all(), [
            'file' => 'max:5120', // 5 MB
        ]);

        if ($validator->fails()) {
            return $this->error('Загружать можно только файлы размером до 5 мегабайт');
        }

        if (!in_array($file->extension(), ['pdf', 'jpg', 'png', 'jpeg'])) {
            return $this->error('Загрузить можно либо картинку, либо PDF файл');
        }
        $dbFileInstance = File::where('user_id', $request->user()->id)
            ->where('type', $request->post('type'))
            ->first();

        if ($dbFileInstance) {
            Storage::delete($dbFileInstance->path . $dbFileInstance->name);
            $dbFileInstance->delete();
        }
        File::create([
            'user_id' => $request->user()->id,
            'type' => $request->post('type'),
            'path' => $path,
            'name' => $fileName
        ]);

        $file->storeAs($path, $fileName);

        return $this->success("Картинка загружена");
    }

    public function get() {
        $files = Auth::user()->files->toArray();

        $data = array_map(function ($item) {
            return ['name' => $item['name'], 'type' => $item['type']];
        }, $files);

        return $this->success($data);
    }

    public function download($type) {
        $file = File::where('user_id', Auth::user()->id)->where('type', $type)->first();
        return Storage::get($file->path . $file->name);
    }

    public function adminDownload($id, $type) {
        $file = File::where('user_id', $id)->where('type', $type)->first();
        return Storage::get($file->path . $file->name);
    }

    public function all() {
        $companies = User::where('role', 'company')->get();
        $output = [];

        foreach ($companies as $company) {
            $output[] = array_merge($company->toArray(), [
                'files' => $company->files->toArray(),
                'data' => $company->data->toArray()
            ]);
        }
        return $this->success($output);
    }

}
