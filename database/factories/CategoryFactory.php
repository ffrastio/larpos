<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'IMAGE' => fake()->imageUrl(360, 360, 'animals', true, 'cats'),
            'NAME' => fake()->word(),
            'DESCRIPTION' => fake()->paragraph(),
        ];
    }
}
