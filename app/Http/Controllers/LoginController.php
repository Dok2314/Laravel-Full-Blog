<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('authorize.login');
    }

    public function login(LoginRequest $request)
    {
        if(Auth::attempt($request->only(['email','password']), $request->input('remember'))) {
            return redirect()->route('user.admin');
        }

        return back()->withErrors([
            'email' => 'Неверный логин или пароль!'
        ]);
    }
}
