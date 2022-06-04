<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserSearchRequest;
use App\Models\Article;
use App\Models\Subscribe;
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
        $roles = Role::all();
        return view('CRUD.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id'  => $request->input('role_id')
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

    public function update(User $user, UpdateUserRequest $request)
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

    public function search(UserSearchRequest $request)
    {
        $search = $request->input('user_search');
        $results = User::where('name', 'like', '%' . $search . '%')
            ->get();

        return view('search.user', compact('results'));
    }

    public function preview(User $user)
    {
        return view('CRUD.users.userPreview', compact('user'));
    }

    public function profile()
    {
        $subscribes = Subscribe::all();

        return view('authorize.profile', compact('subscribes'));
    }
}
