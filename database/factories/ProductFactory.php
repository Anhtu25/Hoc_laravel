<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' =>$this->faker->word,
            'image' =>$this->faker->image,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            // 'description' =>$this->faker->sentence,
            'product_price' =>$this->faker->randomFloat(2, 0, 100),
        ];
    }
}
