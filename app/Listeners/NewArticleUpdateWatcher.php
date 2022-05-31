<?php

namespace App\Listeners;

use App\Helpers\Telegram;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewArticleUpdateWatcher
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = User::where('id', $event->article->user_id)
            ->first();

        $message = sprintf("<b>Статья %s обновлена</b> пользователем:
                                    ".PHP_EOL.$user->name.PHP_EOL.$user->email, $event->article->title);

        $this->telegram->sendMessage('963610354', $message);
    }
}
