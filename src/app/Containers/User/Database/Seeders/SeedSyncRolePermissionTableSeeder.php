<?php

namespace App\Containers\User\Database\Seeders;

use App\Containers\User\Data\Enums\PermissionListEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SeedSyncRolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::findByName('Admin');
        $adminRole->givePermissionTo(PermissionListEnum::PERM_LIST);

        $managerRole = Role::findByName('Manager');
        $managerRole->givePermissionTo(PermissionListEnum::USERS_INDEX);
    }
}
