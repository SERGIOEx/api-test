<?php

namespace App\Containers\User\Database\Seeders;

use App\Containers\User\Entities\User;
use Illuminate\Database\Seeder;

class UserTableTableSeeder extends Seeder
{
    private int $count = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(env('GENERATE_USERS_DEFAULT_CNT') ?? $this->count)->create();
    }
}
