<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->sentence();

        return [
                'name' => $name,
                'phone' => $this->faker->e164PhoneNumber(),
                'subject' => $this->faker->sentences(rand(2, 5), true),
                'email' => $this->faker->unique()->safeEmail(),
                'email_verified_at' => now(),
        ];
    }
}
