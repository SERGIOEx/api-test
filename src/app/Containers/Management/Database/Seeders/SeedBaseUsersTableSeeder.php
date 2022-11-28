<?php

namespace App\Containers\Management\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Containers\Management\Data\Enums\UserStatusEnum;
use App\Containers\Management\Entities\User;

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
            'fullname'  => 'admin',
            'is_active' => UserStatusEnum::ACTIVE,
            'email'     => 'admin@admin.com',
            'password'  => 'password',
        ]);

        $admin->assignRole('Admin');

        $manager = User::create([
            'fullname'  => 'manager',
            'is_active' => UserStatusEnum::ACTIVE,
            'email'     => 'manager@manager.com',
            'password'  => 'password',
        ]);

        $manager->assignRole('Manager');
    }
}
