<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SexFactory extends Factory
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
                'title' => $name,
                'description' => $this->faker->sentences(rand(2, 5), true),
                'image' => $this->faker->imageUrl(),
        ];
    }
}
