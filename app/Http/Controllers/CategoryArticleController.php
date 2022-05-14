<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryArticleRequest;
use App\Models\CategoryArticle;

class CategoryArticleController extends Controller
{
    public function index()
    {
        $categoryArticles = CategoryArticle::paginate(10);

        return view('CRUD.categoryArticles.index', compact('categoryArticles'));
    }

    public function create()
    {
        return view('CRUD.categoryArticles.create');
    }

    public function store(CategoryArticleRequest $request)
    {
        $categoryArticle = new CategoryArticle([
            'title' => $request->input('title'),
            'slug' => $request->input('title'),
            'description' => $request->input('title'),
        ]);

        $categoryArticle->save();

        return redirect()->route('category_article.edit', $categoryArticle)->with('success', sprintf(
           'Категория %s успешно создана!',
           $categoryArticle->title
        ));
    }

    public function edit(CategoryArticle $categoryArticle)
    {
        return view('CRUD.categoryArticles.edit', compact('categoryArticle'));
    }

    public function update(CategoryArticle $categoryArticle, CategoryArticleRequest $request)
    {
        $categoryArticle->title = $request->input('title');
        $categoryArticle->slug = $request->input('title');
        $categoryArticle->description = $request->input('description');

        $categoryArticle->save();

        return redirect()->route('category_article.index')->with('success', sprintf(
            'Категория %s успешно обнолена!',
            $categoryArticle->title
        ));
    }

    public function destroy(CategoryArticle $categoryArticle)
    {
        $categoryArticle->delete();

        return redirect()->route('category_article.index')->with('success', sprintf(
           'Категория %s успешно удалена!',
           $categoryArticle->title
        ));
    }
}
