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
        $rateLimiterKey = $request->input('email') . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($rateLimiterKey, 3)) {
            return back()->with('error', sprintf(
                'Слишком много попыток! Подождите %d сек.',
                RateLimiter::availableIn($rateLimiterKey)
            ));
        }

        if (Auth::attempt($request->only(['email', 'password']), $request->boolean('remember'))) {
            $user = Auth::user();

            RateLimiter::clear($rateLimiterKey);

            if($user->role_id == 3) {
                return redirect()->route('user.profile')->with('success', sprintf(
                    'С возвращением %s',
                    $user->name
                ));
            }

            return redirect()->route('user.admin')->with('success', sprintf(
                'С возвращением %s',
                $user->name
            ));
        }

        RateLimiter::hit($rateLimiterKey, 60);
        $leave = RateLimiter::remaining($rateLimiterKey, 3);

        return back()->with('error', $leave > 0
            ? sprintf(
                'Неверные данные! Осталось попыток: %d!',
                $leave
            )
            : 'Последняя попытка!'
        );
    }
}
