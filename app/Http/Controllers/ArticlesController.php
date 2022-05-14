<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\CategoryArticle;
use Auth;

class ArticlesController extends Controller
{
    public function create()
    {
        if(Auth::user()) {
            $categories = CategoryArticle::all();

            return view('CRUD.articles.create', compact('categories'));
        }else{
            return  redirect()->route('home')->with('error','Для начала авторизируйтесь');
        }
    }

    public function index()
    {
        $articles = Article::paginate(10);

        return view('CRUD.articles.index', compact('articles'));
    }

    public function store(ArticleRequest $request)
    {
        $path = $request->file('image')->store('articles', 'images');

        $article = new Article([
            'title'       => $request->input('title'),
            'image'       => $path,
            'article'     => $request->input('article'),
            'category_id' => $request->input('category')
        ]);

        $article->save();

        return redirect()->route('articles.edit', $article)->with('success', sprintf(
           'Сатья %s успешно создана!',
           $article->title
        ));
    }

    public function edit(Article $article)
    {
        $categories = CategoryArticle::all();

        return view('CRUD.articles.edit', compact('article','categories'));
    }

    public function update(Article $article, ArticleUpdateRequest $request)
    {
        $article->title = $request->input('title');

        if ($request->file('image')) {
            $path = $request->file('image')->store('articles', 'images');
            $article->image = $path;
        }

        $article->article = $request->input('article');
        $article->category_id = $request->input('category');

        $article->save();

        return back()->with('success', sprintf(
            'Статья %s успешно обновлена!',
            $article->title
        ));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')->with('success', sprintf(
            'Статья %s успешно удалена!',
            $article->title
        ));
    }

    public function preview(Article $article)
    {
        return view('CRUD.articles.preview', compact('article'));
    }
}
