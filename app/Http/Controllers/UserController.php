<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('CRUD.users.index', compact('users'));
    }

    public function create()
    {
        return view('CRUD.users.create');
    }

    public function store(UserRequest $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $user->save();

        return redirect()->route('users.edit', $user)->with('success', sprintf(
            'Пользователь %s успешно создан!',
            $user->name
        ));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('CRUD.users.edit', compact('user', 'roles'));
    }

    public function update(User $user, UserRequest $request)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return back();
    }
}
