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
        foreach (PermissionListEnum::PERM_LIST as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }
    }
}
