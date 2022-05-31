<?php

namespace App\Listeners;

use App\Events\NewCreatedArticle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class NewArticleWatcher
{
    /**
     * Create the event listener.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewCreatedArticle  $event
     * @return void
     */
    public function handle(NewCreatedArticle $event)
    {
        $user = User::where('id', $event->article->user_id)->first();

        $message = sprintf("<b>Добавлена новая статья %s</b> пользователем:
                                    ".PHP_EOL.$user->name.PHP_EOL.$user->email, $event->article->title);
        \Illuminate\Support\Facades\Http::post('https://api.telegram.org/botsecret/sendMessage',[
            'chat_id' => 'secret',
            'text' => $message,
            'parse_mode' => 'html'
        ]);
    }
}
