<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'total' => fake()->numberBetween(0,2),
            'cashIn' => fake()->numberBetween(0,2),
            'status' => fake()->boolean(),
            'payment' => fake()->numberBetween(0,2),
            'change' => fake()->numberBetween(0,2),           
            
            
            // 'customer_id' => Customer::all()->random()->id,
            // 'remember_token' => Str::random(10),
        ];
    }
}


/*
$table->Increments('id');
            $table->decimal('total');
            $table->decimal('cashIn');
            $table->boolean('status');
            $table->decimal('payment');
            $table->decimal('change');

            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');

            */