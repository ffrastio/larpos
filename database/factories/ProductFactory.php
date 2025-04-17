<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "CATEGORY_ID" => fake()->numberBetween(1, 5),
            "IMAGE" => fake()->imageUrl(360, 360, 'animals'),
            "BARCODE" => fake()->randomNumber(7, true),
            "NAME" => fake()->name(),
            "DESCRIPTION" => fake()->paragraph(),
            "PREVIOUS_PRICE" => fake()->randomNumber(5, false),
            "BUY_PRICE" => fake()->randomNumber(5, false),
            "SELL_PRICE" => fake()->randomNumber(5, false),
            "STOCK" => fake()->randomNumber(2, false)
        ];
    }
}
