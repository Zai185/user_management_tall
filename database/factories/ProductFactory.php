<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name,
            "description" => fake()->text(80),
            "SKU" => fake()->text(12),
            "sale_price" => 40000,
            "purchased_price" => 20000,
            "category_id" => rand(1,4),
            "brand_id" => rand(1,4),
            "unit_id" => rand(1,4),
            "is_active" => rand(0,1)
        ];
    }
}
