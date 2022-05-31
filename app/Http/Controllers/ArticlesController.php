<?php

namespace App\Http\Controllers;

use App\Events\NewCreatedArticle;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\CategoryArticle;
use App\Models\Comment;
use Auth;
use App\Models\Tag;
use App\Http\Requests\SearchRequest;
use App\Events\NewUpdatedArticle;

class ArticlesController extends Controller
{
    public function create()
    {
        if(Auth::user()) {
            $categories = CategoryArticle::all();
            $tags = Tag::all();

            return view('CRUD.articles.create', compact('categories','tags'));
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
        $user = Auth::user();

        $article = new Article([
            'title'       => $request->input('title'),
            'image'       => $path,
            'article'     => $request->input('article'),
            'category_id' => $request->input('category'),
            'user_id'     => $user->id
        ]);

        event(new NewCreatedArticle($article));

        $article->save();

        $article->tags()->sync($request->tags);

        return redirect()->route('articles.edit', $article)->with('success', sprintf(
           'Сатья %s успешно создана!',
           $article->title
        ));
    }

    public function edit(Article $article)
    {
        $categories = CategoryArticle::all();
        $tags = Tag::all();

        return view('CRUD.articles.edit', compact('article','categories','tags'));
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
        $article->tags()->sync($request->input('tags'));

        event(new NewUpdatedArticle($article));

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
        $tags = $article->tags()->get();
        $article_id = $article->id;
        $comments = $article->commentsWithoutParent()
            ->orderBy('created_at', 'DESC')
            ->paginate(3);

        return view('CRUD.articles.preview', compact('article','tags','comments'));
    }

    public function search(SearchRequest $request)
    {
        $search  = $request->input('search');
        $results = Article::where('title', 'like', '%' . $search . '%')
            ->get();

        return view('search.index', compact('results'));
    }
}
