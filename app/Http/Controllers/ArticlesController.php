<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;

class ArticlesController extends Controller
{
    public function create()
    {
        $categories = ArticleCategory::all();

        return view('CRUD.articles.create', compact('categories'));
    }

    public function index()
    {
        return view('CRUD.articles.create');
    }

    public function store(ArticleRequest $request)
    {
        $path = $request->file('image')->store('articles', 'images');

        $article = new Article([
            'title'       => $request->input('title'),
            'image'       => $path,
            'article'     => $request->input('article'),
            'category_id' => 1
//            'category_id' => $request->input('category')
        ]);

        $article->save();

        return redirect()->route('home')->with('success', sprintf(
           'Сатья %s успешно создана!',
           $article->title
        ));
    }
}
