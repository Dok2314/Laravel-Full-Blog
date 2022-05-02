<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function registrationView()
    {
        return view('authorize.registration');
    }

    public function registration(RegistrationRequest $request)
    {
        $validatedFields = $request->all();

        event(new Registered(
           $user = $this->create($validatedFields)
        ));

        if($request->has('avatar')) {
            $user
                ->addMedia($request->file('avatar'))
                ->toMediaCollection();
        }

        $this->guard()->login($user, true);

        return redirect()->route('user.admin')->with('success', sprintf(
           'Пользователь %s успешно зарегестрирован!',
           $user->name
        ));
    }

    public function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }
}