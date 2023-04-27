<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->sentence(4),
            'image' => $this->faker->image(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'status' => $this->faker->numberBetween(1, 3),
        ];
    }
}
