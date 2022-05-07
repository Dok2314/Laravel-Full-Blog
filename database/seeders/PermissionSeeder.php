<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Создавать категории',
            'code' => 'category create'
        ]);
        Permission::create([
            'name' => 'Просматривать категории',
            'code' => 'category view'
        ]);
        Permission::create([
            'name' => 'Редактировать категории',
            'code' => 'category edit'
        ]);
        Permission::create([
            'name' => 'Удалять категории',
            'code' => 'category delete'
        ]);

        Permission::create([
            'name' => 'Создавать записи',
            'code' => 'post create'
        ]);
        Permission::create([
            'name' => 'Просматривать записи',
            'code' => 'post view'
        ]);
        Permission::create([
            'name' => 'Редактировать записи',
            'code' => 'post edit'
        ]);
        Permission::create([
            'name' => 'Удалять записи',
            'code' => 'post delete'
        ]);

        Permission::create([
            'name' => 'Создавать юзера',
            'code' => 'users create'
        ]);
        Permission::create([
            'name' => 'Просматривать юзера',
            'code' => 'users view'
        ]);
        Permission::create([
            'name' => 'Редактировать юзера',
            'code' => 'users edit'
        ]);
        Permission::create([
            'name' => 'Удалять юзера',
            'code' => 'users delete'
        ]);

        Permission::create([
            'name' => 'Создавать роль',
            'code' => 'role create'
        ]);
        Permission::create([
            'name' => 'Просматривать роль',
            'code' => 'role view'
        ]);
        Permission::create([
            'name' => 'Редактировать роль',
            'code' => 'role edit'
        ]);
        Permission::create([
            'name' => 'Удалять роль',
            'code' => 'role delete'
        ]);
    }
}