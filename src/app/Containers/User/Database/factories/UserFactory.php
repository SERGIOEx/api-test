<?php

namespace App\Containers\User\Database\Factories;

use App\Containers\User\Data\Enums\UserStatusEnum;
use App\Containers\User\Entities\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'is_active'         => UserStatusEnum::ACTIVE,
            'first_name'        => $this->faker->firstName(),
            'last_name'         => $this->faker->lastName(),
            'phone'             => $this->faker->e164PhoneNumber(),
            'email'             => 'test_' . $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'avatar'            => null,
            'password'          => Hash::make('password')
        ];
    }
}
