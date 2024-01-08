<?php

namespace Database\Factories;

use App\Models\Menu;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
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
            'description' => fake()->text(),
            'status' => fake()->boolean(),
            'image' => fake()->imageUrl(500,500, true),
            'price' => fake()->numberBetween(0,2),           
            
            
            'user_id' => User::all()->random()->id,
            'menu_id' => Menu::all()->random()->id,
            // 'remember_token' => Str::random(10),
        ];
    }
}

/*
$table->Increments('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('status');
            $table->string('image');
            $table->decimal('price');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus');
            */