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
}
