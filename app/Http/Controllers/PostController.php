<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
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

    public function postCreateView()
    {
        $categories = $this->getCategories();

        return view('CRUD.postIndex', compact('categories'));
    }

    public function createPost(PostRequest $request)
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

    public function postAll()
    {
        $posts = $this->getPosts();

        return view('CRUD.postAll', compact('posts'));
    }

    public function deletePost($post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->delete();

        return redirect()->route('post.postAll')->with('success', sprintf(
           'Пост %s успешно удалён',
                $post->title
        ));
    }

    public function postPreview($post_id)
    {
        $post = Post::findOrFail($post_id);
        $categories = Category::all();

        return view('CRUD.postPreview', compact('post', 'categories'));
    }

    public function postUpdate(PostRequest $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post->title = $request->title;
        $post->slug  = $request->title;
        $post->post  = $request->post;
        $post->user()->associate($request->user());
        $post->category()->associate($request->category_id);

        $post->update();
        return redirect()->route('post.postAll')->with('success', sprintf(
           'Пост %s успешно обновлен!',
                    $post->title
        ));
    }
}
