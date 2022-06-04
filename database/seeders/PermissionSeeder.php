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

        Permission::create([
            'name' => 'Создавать статью',
            'code' => 'article create'
        ]);
        Permission::create([
            'name' => 'Просматривать статью',
            'code' => 'article view'
        ]);
        Permission::create([
            'name' => 'Редактировать статьи',
            'code' => 'article edit'
        ]);
        Permission::create([
            'name' => 'Удалять статью',
            'code' => 'article delete'
        ]);

        Permission::create([
            'name' => 'Создавать ктегорию статьи',
            'code' => 'category_of_article create'
        ]);
        Permission::create([
            'name' => 'Просматривать категорию статьи',
            'code' => 'category_of_article view'
        ]);
        Permission::create([
            'name' => 'Редактировать категорию статьи',
            'code' => 'category_of_article edit'
        ]);
        Permission::create([
            'name' => 'Удалять категорию статьи',
            'code' => 'category_of_article delete'
        ]);

        Permission::create([
            'name' => 'Создавать тег',
            'code' => 'tag create'
        ]);
        Permission::create([
            'name' => 'Просматривать тег',
            'code' => 'tag view'
        ]);
        Permission::create([
            'name' => 'Редактировать тег',
            'code' => 'tag edit'
        ]);
        Permission::create([
            'name' => 'Удалять тег',
            'code' => 'tag delete'
        ]);

        Permission::create([
            'name' => 'Создавать подписку',
            'code' => 'subscribe create'
        ]);
        Permission::create([
            'name' => 'Просматривать подписку',
            'code' => 'subscribe view'
        ]);
        Permission::create([
            'name' => 'Редактировать подписку',
            'code' => 'subscribe edit'
        ]);
        Permission::create([
            'name' => 'Удалять подписку',
            'code' => 'subscribe delete'
        ]);
    }
}
