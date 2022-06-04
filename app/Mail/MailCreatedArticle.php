<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailCreatedArticle extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $article;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $article)
    {
        $this->user = $user;
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.subscribe');
    }
}
