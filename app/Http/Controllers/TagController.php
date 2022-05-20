<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Article;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('CRUD.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('CRUD.tags.create');
    }

    public function store(TagRequest $request)
    {
        $tag = new Tag([
            'title' => $request->input('title'),
            'slug' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        $tag->save();

        return redirect()->route('tags.edit', $tag)->with('success', sprintf(
            'Тег %s успешно добавлен',
            $tag->title
        ));
    }

    public function edit(Tag $tag)
    {
        return view('CRUD.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, TagRequest $request)
    {
        $tag->title = $request->input('title');
        $tag->slug = $request->input('title');
        $tag->description = $request->input('description');

        $tag->save();

        return redirect()->route('tags.index')->with('success', sprintf(
            'Тег %s успешно обновлен!',
            $tag->title
        ));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')->with('success', sprintf(
            'Тег %s был успешно удален!',
            $tag->title
        ));
    }

    public function findArticlesBySlug(Tag $tag)
    {
        $articles = Article::query()
            ->whereHas('tags', function ($query) use ($tag) {
                $query->where('slug', $tag->slug);
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('tag.index', compact('articles', 'tag'));
    }
}
