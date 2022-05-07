<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Role;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('CRUD.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'title'       => $request->title,
            'slug'        => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('user.admin')->with('success', sprintf(
           'Категория %s успешно добавлена!',
            $request->input('title')
        ));
    }

    public function index()
    {
        $categories = Category::paginate(5);
        return view('CRUD.categories.index', compact('categories'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Категория успешно удалена');
    }

    public function edit(Category $category)
    {
        return view('CRUD.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->title       = $request->title;
        $category->slug        = $request->title;
        $category->description = $request->description;
        $category->update();

        return redirect()->route('category.index')->with('success', sprintf(
           'Категория успешно обновлена'
        ));
    }
}
