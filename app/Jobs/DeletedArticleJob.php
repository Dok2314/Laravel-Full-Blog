<?php

namespace App\Jobs;

use App\Mail\DeletedArticleMail;
use App\Mail\MailCreatedArticle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DeletedArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $article;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $article)
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
        Mail::to($this->user)->send(new DeletedArticleMail($this->user, $this->article));
    }
}
