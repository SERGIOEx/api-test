<?php

namespace App\Containers\User\Database\Factories;

use App\Containers\User\Entities\Company;
use App\Containers\User\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'author_id'   => random_int(1, env('GENERATE_USERS_DEFAULT_CNT') ?? $this->count),
            'title'       => $this->faker->company(),
            'phone'       => $this->faker->e164PhoneNumber(),
            'description' => $this->faker->realText(200),
        ];
    }
}
