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
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $name = $user->name ?? '';

        $executed = RateLimiter::attempt(
            'login:'.$user->id,
            5,
            function() use($request, $name){
                if(Auth::attempt($request->only(['email', 'password']), $request->input('remember'))) {
                    return redirect()->route('user.admin')->with('success', sprintf(
                        'С возвращением %s',
                        $name
                    ));
                }
            },
        120);

        if (! $executed) {
            return back()->with('error', 'Слишком много попыток, подождите 2 минуты!');
        }

        return back()->withErrors([
           'email' => 'Неверные данные, повторите попытку.'
        ]);
    }
}
