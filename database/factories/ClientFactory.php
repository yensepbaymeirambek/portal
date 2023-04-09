<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birthday' => fake()->dateTimeInInterval('-6 years', '+ 18 years'),
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'email' => fake()->email,
            'school' => fake()->address,
            'is_active' => rand(0,1)
        ];
    }

}
