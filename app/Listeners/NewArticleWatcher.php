<?php

namespace App\Listeners;

use App\Events\NewCreatedArticle;
use App\Helpers\Telegram;
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
    protected $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\NewCreatedArticle $event
     * @return void
     */
    public function handle(NewCreatedArticle $event)
    {
        $user = User::where('id', $event->article->user_id)->first();

        $message = sprintf("<b>Добавлена новая статья %s</b> пользователем:
                                    " . PHP_EOL . $user->name . PHP_EOL . $user->email, $event->article->title);

        $this->telegram->sendMessage('963610354', $message);
    }
}
