<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;
use App\Models\Meal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealItem>
 */
class MealItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'meal_id' => Meal::all()->random()->id,
            'item_id' => Item::all()->random()->id,
            'discount' => fake()->numberBetween(1,100),
        ];
    }
}
/*
            $table->integer('discount');
            $table->integer('meal_id')->unsigned();
            $table->foreign('meal_id')->references('id')->on('meals');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
            $table->timestamps();
*/