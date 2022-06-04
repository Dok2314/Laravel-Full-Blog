<?php

namespace App\Listeners;

use App\Jobs\DeletedArticleJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class DeletedArticleListener
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $users = User::whereHas('subscribes', function ($query){
            $query->where('code', 'podpiska_na_sozdanie_statei_na_saite');
        })->get();

        foreach ($users as $user)
        {
            dispatch(new DeletedArticleJob($user, $event->article));
        }
    }
}
