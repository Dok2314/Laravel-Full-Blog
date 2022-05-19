<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Article;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\RateLimiter;

class CommentsController extends Controller
{
    public function store(CommentsRequest $request)
    {
        $article_id = $request->input('article_id');
        $article    = Article::where('id', $article_id)->first();
        $user       = Auth::user();

        $comment = new Comment([
            'title' => $request->input('title'),
            'slug' => $request->input('title'),
            'comment' => $request->input('comment'),
            'article_id' => $article_id
        ]);

        if(!isset($user)){
            $executed = RateLimiter::attempt(
                'comment:',
                 1,
                function() use($comment){
                    $comment->save();
                },
            600);

            if (!$executed) {
                return back()->with('error', 'Авторизуйтесь чтобы отправлять более 1 коментария в 10 минут!');
            }
        }else{
            $executed = RateLimiter::attempt(
                'comment:'.$user->id,
                5,
                function() use($comment){
                    $comment->save();
                },
                60);

            if (!$executed) {
                return back()->with('error', 'Можно отправить только 5 коментариев за 1 минуту!');
            }
        }

        return redirect()->route('articles.preview', $article)->with('success', sprintf(
            'Коментарий успешно добавлен!',
            $comment->title
        ));
    }
}
