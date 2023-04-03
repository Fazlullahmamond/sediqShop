<?php

namespace Database\Factories;

use App\Models\SubCategory;
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
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(3),
            'slug' => $this->faker->slug(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount' => $this->faker->numberBetween(0, 50),
            'quantity' => $this->faker->numberBetween(1, 10),
            'all_details' => $this->faker->paragraphs(3, true),
            'sub_category_id' => SubCategory::inRandomOrder()->first()->id,
            'tags' => $this->faker->words(3, true),
            'hot_offer' => $this->faker->boolean,
            'feature' => $this->faker->boolean,
            'status' => $this->faker->numberBetween(1, 3),
            'views' => $this->faker->numberBetween(0, 10000),
        ];
    }
}
