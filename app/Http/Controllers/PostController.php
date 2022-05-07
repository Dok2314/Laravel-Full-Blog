<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function getCategories()
    {
        return Category::all();
    }

    public function getPosts()
    {
        return Post::paginate(5);
    }

    public function create()
    {
        $categories = $this->getCategories();

        return view('CRUD.posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $post = new Post([
            'title'       => $request->title,
            'slug'        => $request->title,
            'post'        => $request->post
        ]);

        $post->user()->associate($request->user());
        $post->category()->associate($request->category_id);

        $post->save();

        return redirect()->route('user.admin')->with('success', sprintf(
           'Пост %s успешно добавлен',
           $request->title
        ));
    }

    public function index()
    {
        $posts = $this->getPosts();

        return view('CRUD.posts.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Пост успешно удален');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('CRUD.posts.edit', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug  = $request->title;
        $post->post  = $request->post;
        $post->user()->associate($request->user());
        $post->category()->associate($request->category_id);

        $post->update();
        return redirect()->route('post.index')->with('success', sprintf(
           'Пост %s успешно обновлен!',
                    $post->title
        ));
    }
}
