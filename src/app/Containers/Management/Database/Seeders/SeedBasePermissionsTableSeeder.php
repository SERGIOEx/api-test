<?php

namespace App\Containers\Management\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Containers\Management\Data\Enums\PermissionListEnum;
use Spatie\Permission\Models\Permission;

class SeedBasePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (PermissionListEnum::SERVICES_LIST_PERM as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        foreach (PermissionListEnum::USERS_LIST_PERM as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        foreach (PermissionListEnum::ROLES_LIST_PERM as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        foreach (PermissionListEnum::ORDERS_LIST_PERM as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        foreach (PermissionListEnum::CLIENTS_LIST_PERM as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }

        foreach (PermissionListEnum::ANOTHER_LIST_PERM as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }
    }
}
