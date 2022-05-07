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
    }
}
