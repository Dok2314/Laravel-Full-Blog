<?php

namespace App\Listeners;

use App\Events\NewCreatedArticle;
use App\Jobs\SendMailCreatedArticleJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class NewArticleMailingWatcher
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewCreatedArticle  $event
     * @return void
     */
    public function handle($event)
    {
        $users = User::whereHas('subscribes', function ($query){
            $query->where('code', 'podpiska_na_sozdanie_statei_na_saite');
        })->get();

        foreach ($users as $user)
        {
            dispatch(new SendMailCreatedArticleJob($user, $event->article))->delay(10);
        }
    }
}
