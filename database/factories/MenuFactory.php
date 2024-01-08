<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->words(2, true),
            'type' => fake()->word(),
            'description' => fake()->text(),
            'status' => fake()->boolean(),
            'image' => fake()->imageUrl(500,500, true),
            'user_id' => User::all()->random()->id,
            // 'remember_token' => Str::random(10),
        ];
    }
}
