<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image_path' => '/public/unnamed.jpg',
            'description'=>$this->faker->paragraph(rand(2, 6)),
            'created_at' => $this->faker->dateTimeBetween('-1 years', '-30 days'),
            'updated_at' => $this->faker->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
