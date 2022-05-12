<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tap(Role::create([
            'name' => 'Администратор'
        ]), function (Role $role) {
            $role->permissions()->sync(Permission::whereIn('code', [
                'category create',
                'category view',
                'category edit',
                'category delete',
                'post create',
                'post view',
                'post edit',
                'post delete',
                'users create',
                'users view',
                'users edit',
                'users delete',
                'role create',
                'role view',
                'role edit',
                'role delete'
            ])->get());
        });

        tap(Role::create([
            'name' => 'Разработчик'
        ]), function (Role $role) {
            $role->permissions()->syncWithoutDetaching(Permission::whereIn('code', [
                'category create',
                'category view',
                'category edit',
                'category delete',
                'post create',
                'post view',
                'post edit',
                'post delete',
                'users view',
                'role view'
            ])->get());
        });

        tap(Role::create([
            'name' => 'Пользователь'
        ]), function (Role $role) {
            $role->permissions()->sync(Permission::whereIn('code', [
                'category create',
                'category view',
                'category edit',
                'post create',
                'post view',
                'post edit',
            ])->get());
        });
    }
}
