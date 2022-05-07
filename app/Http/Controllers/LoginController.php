<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

        if(Auth::attempt($request->only(['email', 'password']), $request->input('remember'))) {
            return redirect()->route('user.admin')->with('success', sprintf(
                'С возвращением %s',
                $name
            ));
        }

        return back()->withErrors([
           'email' => 'Неверные данные, повторите попытку.'
        ]);
    }
}
