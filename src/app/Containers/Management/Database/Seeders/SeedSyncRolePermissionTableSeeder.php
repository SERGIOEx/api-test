<?php

namespace App\Containers\Management\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Containers\Management\Data\Enums\PermissionListEnum;
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
        $adminRole->givePermissionTo(PermissionListEnum::ANOTHER_LIST_PERM);
        $adminRole->givePermissionTo(PermissionListEnum::SERVICES_LIST_PERM);
        $adminRole->givePermissionTo(PermissionListEnum::ROLES_LIST_PERM);
        $adminRole->givePermissionTo(PermissionListEnum::USERS_LIST_PERM);
        $adminRole->givePermissionTo(PermissionListEnum::ORDERS_LIST_PERM);
        $adminRole->givePermissionTo(PermissionListEnum::CLIENTS_LIST_PERM);

        $managerRole = Role::findByName('Manager');
        $managerRole->givePermissionTo(PermissionListEnum::ANOTHER_LIST_PERM);
        $managerRole->givePermissionTo(PermissionListEnum::SERVICES_LIST_PERM);
        $managerRole->givePermissionTo(PermissionListEnum::ORDERS_LIST_PERM);
        $managerRole->givePermissionTo(PermissionListEnum::CLIENTS_LIST_PERM);
    }
}
