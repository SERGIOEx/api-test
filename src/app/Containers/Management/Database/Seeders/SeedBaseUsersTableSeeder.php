<?php

namespace App\Containers\Management\Database\Seeders;

use App\Containers\User\Data\Enums\UserStatusEnum;
use App\Containers\User\Entities\User;
use Illuminate\Database\Seeder;

class SeedBaseUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'Alex',
            'last_name'  => 'Admin',
            'is_active' => UserStatusEnum::ACTIVE,
            'email'     => 'admin@admin.com',
            'password'  => 'password',
        ]);

        $admin->assignRole('Admin');

        $manager = User::create([
            'first_name' => 'Alisa',
            'last_name'  => 'Manager',
            'is_active'  => UserStatusEnum::ACTIVE,
            'email'      => 'manager@manager.com',
            'password'   => 'password',
        ]);

        $manager->assignRole('Manager');
    }
}
