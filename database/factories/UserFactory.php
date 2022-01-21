<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $roles = ['regular', 'premium'];
        $role = $roles[array_rand($roles)];
        $email = $this->faker->unique()->safeEmail();
        $nickname = strtok($email, '@');
        return [
            'role' => $role,
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'nickname' => $nickname,
            'email' => $email,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'image' => '/public/unnamed.jpg',
            'created_at' => $this->faker->dateTimeBetween('-10 years', '-2 years'),
            'updated_at' => $this->faker->dateTimeBetween('-2 years', 'now'),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
