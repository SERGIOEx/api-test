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
        $adminRole->givePermissionTo(PermissionListEnum::PERM_LIST);

        $managerRole = Role::findByName('Manager');
        $managerRole->givePermissionTo(PermissionListEnum::PERM_LIST);
    }
}
