<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function categoryView()
    {
        return view('CRUD.categoryIndex');
    }

    public function create(CategoryRequest $request)
    {

        Category::firstOrCreate([
            'title'       => $request->title,
            'slug'        => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('user.admin')->with('success', sprintf(
           'Категория %s успешно добавлена!',
            $request->input('title')
        ));
    }

    public function categoryAll()
    {
        $categories = Category::all();
        return view('CRUD.categoryAll', compact('categories'));
    }

    public function categoryDelete($category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->delete();

        return redirect()->route('CRUD.categoryAll')->with('success', sprintf(
           'Категория %s успешно удалена!',
           $category->title
        ));
    }

    public function categoryPreview($category_id)
    {
        $category = Category::findOrFail($category_id);

        return view('CRUD.categoryPreview', compact('category'));
    }

    public function categoryUpdate(CategoryRequest $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $category->title       = $request->title;
        $category->slug        = $request->title;
        $category->description = $request->description;
        $category->update();

        return redirect()->route('CRUD.categoryAll')->with('success', sprintf(
           'Категория успешно обновлена'
        ));
    }
}
