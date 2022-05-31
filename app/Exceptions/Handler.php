<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Throwable;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (ThrottleRequestsException $e) {
            return redirect()->back()->with('error',sprintf(
               'Слишком много попыток! Подождите %s сек.',$e->getHeaders()['Retry-After']
            ));
        });
    }

    public function report(Throwable $e)
    {
        \Illuminate\Support\Facades\Http::post('https://api.telegram.org/bot5552922502:AAE0jDcA1UXqGmAcjvPIh8RREQl8jnLiqvg/sendMessage',[
            'chat_id' => '963610354',
            'text' => '<b>Hello Dok</b>',
            'parse_mode' => 'html'
        ]);
    }
}
