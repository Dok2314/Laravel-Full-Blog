<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\Article;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\LikeRequest;

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
            'article_id' => $article_id,
            'parent_id' => $request->input('parent_id'),
            'user_id' => $user->id ?? NULL
        ]);

        if($user) {
            $rateLimiterKey = 'comment:' . $user->id;
            $maxAttempts = 5;
            $block = 60;
        }else{
            $rateLimiterKey = 'comment:' . $request->ip();
            $maxAttempts = 1;
            $block = 600;
        }

        if(RateLimiter::tooManyAttempts($rateLimiterKey, $maxAttempts)) {
            return redirect()->route('articles.preview', $article)->with('error',sprintf(
               'Слишком много попыток! Подождите %d сек.',
                RateLimiter::availableIn($rateLimiterKey)
            ));
        }

        RateLimiter::hit($rateLimiterKey, $block);

        $comment->save();

        $leave = RateLimiter::remaining($rateLimiterKey, $maxAttempts);

        return redirect()->route('articles.preview', $article)->with('success', $leave > 0
            ? sprintf(
                'Коментарий %s успешно добавлен!Вы можите добавить ещё %d!',
                $comment->title,
                $leave
            ) :
            sprintf(
                'Коментарий %s успешно добавлен! Осталась последняя попытка!',
                $comment->title,
                $leave
            )
        );
    }

    public function like(Article $article)
    {
        $user = Auth::user();

        $user->likes()->toggle($article->id);

        return redirect()->route('articles.preview', $article);
    }
}
