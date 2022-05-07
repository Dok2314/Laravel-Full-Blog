<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
        ]);

        User::create([
            'name' => 'Daniil',
            'email' => 'dok@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '1'
        ]);
    }
}
