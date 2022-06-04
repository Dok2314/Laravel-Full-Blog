<?php

namespace App\Jobs;

use App\Mail\MailCreatedArticle;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Mail;

class SendMailCreatedArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Article $article)
    {
        $this->user = $user;
        $this->article = $article;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new MailCreatedArticle($this->user, $this->article));
    }
}
