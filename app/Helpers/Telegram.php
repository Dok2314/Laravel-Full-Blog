<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Telegram
{
    public function sendMessage($chatId, $message)
    {
        Http::post('https://api.telegram.org/bot5552922502:AAE0jDcA1UXqGmAcjvPIh8RREQl8jnLiqvg/sendMessage',[
            'chat_id'    => $chatId,
            'text'       => $message,
            'parse_mode' => 'html'
        ]);
    }
}
