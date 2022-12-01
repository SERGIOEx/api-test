<?php

namespace App\Containers\User\Database\Seeders;

use App\Containers\User\Data\Enums\PermissionListEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SeedBasePermissionTableSeeder extends Seeder
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
