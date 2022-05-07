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
                'category view',
                'category delete'
            ])->get());
        });

        Role::create([
            'name' => 'Разработчик'
        ]);

        Role::create([
            'name' => 'Пользователь'
        ]);
    }
}
