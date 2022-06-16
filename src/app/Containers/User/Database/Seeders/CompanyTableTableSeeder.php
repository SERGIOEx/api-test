<?php

namespace App\Containers\User\Database\Seeders;

use App\Containers\User\Entities\Company;
use Illuminate\Database\Seeder;

class CompanyTableTableSeeder extends Seeder
{
    private int $count = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(env('GENERATE_COMPANIES_DEFAULT_CNT') ?? $this->count)->create();
    }
}
