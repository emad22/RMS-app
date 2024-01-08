<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt(Str::random(10)),
            'address' => fake()->address(),
            'city' => fake()->city(),
            'phone'=> fake()->phoneNumber(),
            
        ];
    }
}
/*
$table->Increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address');
            $table->string('city');
            $table->string('phone');
            $table->timestamps();
            */