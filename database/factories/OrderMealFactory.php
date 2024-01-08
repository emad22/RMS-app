<?php

namespace Database\Factories;

use App\Models\Meal;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderMeal>
 */
class OrderMealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::all()->random()->id,
            'meal_id' => Meal::all()->random()->id,
        ];
    }
}
