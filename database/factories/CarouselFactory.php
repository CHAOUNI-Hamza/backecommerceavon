<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarouselFactory extends Factory
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
            'description' => $name,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
