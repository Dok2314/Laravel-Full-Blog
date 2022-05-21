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

        $guestRateLimiterKey = 'comment:'.$request->ip();
        $guestMaxAttempts = 1;
        $authMaxAttempts = 5;
        $guestBlock = 600;
        $authBlock = 60;

        if(!isset($user)) {
            if(RateLimiter::tooManyAttempts($guestRateLimiterKey, $guestMaxAttempts)){
                return redirect()->route('articles.preview', $article)->with('error', sprintf(
                    'Ошибка! Слишком много попыток в минуту! Осталось ждать: %d сек.',
                    RateLimiter::availableIn($guestRateLimiterKey)
                ));
            }
            RateLimiter::hit($guestRateLimiterKey, $guestBlock);
        }else{
            $authUserRateLimiterKey = 'comment:'.$user->id;
            if(RateLimiter::tooManyAttempts($authUserRateLimiterKey,$authMaxAttempts)){
                return redirect()->route('articles.preview', $article)->with('error', sprintf(
                    'Ошибка! Слишком много попыток в минуту! Осталось ждать: %d сек.',
                    RateLimiter::availableIn($authUserRateLimiterKey)
                ));
            }
            RateLimiter::hit($authUserRateLimiterKey, $authBlock);
        }

        $comment->save();

        return redirect()->route('articles.preview', $article)->with('success', sprintf(
            'Коментарий %s успешно добавлен!',
            $comment->title
        ));
    }
}
