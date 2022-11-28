<?php

namespace App\Containers\Management\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ManagementDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SeedBaseRolesTableSeeder::class);
        $this->call(SeedBasePermissionsTableSeeder::class);
        $this->call(SeedBaseUsersTableSeeder::class);
        $this->call(SeedSyncRolePermissionTableSeeder::class);
    }
}
