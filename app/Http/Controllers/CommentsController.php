<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Article;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(CommentsRequest $request)
    {
        $article_id = $request->input('article_id');
        $article = Article::where('id', $article_id)->first();

        $comment = new Comment([
            'title' => $request->input('title'),
            'slug' => $request->input('title'),
            'comment' => $request->input('comment'),
            'article_id' => $article_id
        ]);

        $comment->save();

        return redirect()->route('articles.preview', $article)->with('success', sprintf(
            'Коментарий успешно добавлен!',
            $comment->title
        ));
    }
}
