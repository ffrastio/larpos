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
            'category_id' => fake()->numberBetween(1, 5),
            'image' => fake()->imageUrl(360, 360, 'animals'),
            'barcode' => fake()->randomNumber(7, true),
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'previous_price' => fake()->randomNumber(5, false),
            'buy_price' => fake()->randomNumber(5, false),
            'sell_price' => fake()->randomNumber(5, false),
            'stock' => fake()->randomNumber(2, false)
        ];
    }
}
