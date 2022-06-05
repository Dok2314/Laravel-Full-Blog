<?php

namespace App\Http\Controllers;



use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withTrashed()->paginate(10);

        return view('CRUD.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('CRUD.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = new Role([
           'name' => $request->input('name')
        ]);

        $role->save();

        $role->permissions()->sync($request->permissions);

        return redirect()->route('roles.edit', $role)->with('success', sprintf(
           'Роль %s успешно создана!',
           $role->name
        ));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('CRUD.roles.edit', compact('role','permissions'));
    }

    public function update(Role $role, RoleRequest $request)
    {
        $role->name = $request->input('name');

        $role->permissions()->sync($request->permissions);

        $role->save();

        return back();
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', sprintf(
           'Роль %s удалена',
           $role->name
        ));
    }

    public function restore($role)
    {
        Role::withTrashed()
            ->find($role)
            ->restore();

        return redirect()->back()->with('success', 'Роль успешно востнановлена!');
    }
}
