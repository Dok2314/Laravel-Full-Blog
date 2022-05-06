<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function permissionView()
    {
        return view('CRUD.permissionIndex');
    }

    public function createPermission(PermissionRequest $request)
    {
        $permission = new Permission([
            'name' => $request->name,
            'code' => $request->code
        ]);

        $permission->save();

        return redirect()->route('user.admin')->with('success', sprintf(
            'Право %s успешно создано',
                    $permission->name
        ));
    }

    public function permissionAll()
    {
        $permissions = Permission::all();

        return view('CRUD.permissionAll', compact('permissions'));
    }

    public function deletePermission($permission_id)
    {
        $permission = Permission::findOrFail($permission_id);
        $permission->delete();

        return redirect()->route('permission.permissionAll')->with('success', sprintf(
           'Право %s успешно удалено',
           $permission->name
        ));
    }

    public function previewPermission($permission_id)
    {
        $permission = Permission::findOrFail($permission_id);

        return view('CRUD.permissionPreview', compact('permission'));
    }


    public function updatePermission(PermissionRequest $request, $permission_id)
    {
        $permission = Permission::findOrFail($permission_id);

        $permission->name = $request->name;
        $permission->code = $request->code;

        $permission->update();

        return redirect()->route('permission.permissionAll')->with('success', sprintf(
           'Право %s успешно обновлено',
           $permission->name
        ));
    }
}
