<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commennt>
 */
class CommentFactory extends Factory
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
             'rate' => fake()->randomNumber(),           
            
            
            'customer_id' => Customer::all()->random()->id,
            'order_id' => Order::all()->random()->id,
        ];
    }
}

/*
$table->Increments('id');
            $table->string('title');
            $table->text('description');
            $table->boolean('status');
            $table->string('image');
            $table->integer('rate');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
            */