<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('authorize.login');
    }

    public function login(LoginRequest $request)
    {
        $maxAttempts = 2;
        $rateLimiterKey = 'login:' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimiterKey, $maxAttempts)) {
            return back()->withErrors([
                'email' => sprintf('Слишком много попыток за минуту! Повторите через %d сек.',
                    RateLimiter::availableIn($rateLimiterKey)
                )
            ]);
        }

        RateLimiter::hit($rateLimiterKey);

        if (Auth::attempt($request->only(['email', 'password']), $request->input('remember'))) {
            $user = Auth::user();
            return redirect()->route('user.admin')->with('success', sprintf(
                'Пользователь %s успешно добавлен!',
                $user->name
            ));
        }

        return back()->withErrors([
            'email' => 'Неверный адрес или пароль! У вас осталось попыток: ' . RateLimiter::remaining($rateLimiterKey, $maxAttempts)
        ]);
    }
}
