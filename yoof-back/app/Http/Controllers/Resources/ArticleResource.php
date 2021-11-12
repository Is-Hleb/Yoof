<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class ArticleResource extends Controller
{
    use BaseApiController;
    private $data, $file;

    public function __construct(Request $request)
    {
        $this->data = $request->post();
        $this->file = $request->file('upload');

    }

    public function uploadTitleImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if(!isset($this->data['id']))
        {
            $article = Article::create([
                'image' => 'none',
                'title' => 'Заголовок'
            ]);

        } else {
            $article = Article::find($this->data['id']);
        }

        $name = 'articles/' . $article->id . '/' . Str::random(7) .'.' . $this->file->extension();
        Storage::disk('public_uploads')->put($name, file_get_contents($this->file->getRealPath()));

        $article->image = asset('storage/' . $name);
        $article->save();
        return $this->success(['id' => $article->id]);
    }

    public function uploadTitle(Request $request)
    {
        $id = $this->data['id'];
        $article = Article::find($id);
        $article->title = $this->data['title'];
        $article->save();

        return $this->success();
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $article_id = $this->data['id'];

        $name = 'articles/' . $article_id . '/' . Str::random(10) . '.' . $this->file->extension();
        Storage::disk('public_uploads')->put($name, file_get_contents($this->file->getRealPath()));
        return $this->success(asset('storage/' . $name));
    }

    public function save(Request $request)
    {
        $id = $this->data['id'];
        $article = Article::find($id);
        $article->content = $this->data['content'];
        $article->save();
        return $this->success();
    }

    public function loadAll(Request $request)
    {
        return $this->success(Article::all());
    }

    public function uploadDescription(Request $request)
    {
        try {
            $article = Article::find($this->data['id']);
            $article->description = $this->data['description'];
            $article->save();
            return $this->success();
        } catch (Exception $exception) {
            return $this->error([$exception->getMessage()]);
        }
    }

    public function edit()
    {
        $articleData = $this->data['article'];
        $article = Article::find($articleData['id']);

        foreach ($articleData as $key => $value) {
            if($key == 'id' || $key == 'image') {
                continue;
            }
            $article->$key = $value;
        }
        $article->save();
        return $this->success();
    }

    public function deleteArticle($id)
    {
        Article::destroy($id);
        return $this->success();
    }

}
