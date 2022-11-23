<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(6),
            "category_id" => $this->faker->numberBetween(1, 20)
            // 'category_id' => Category::pluck('id')[$this->faker->numberBetween(1,Category::count()-1)]
        ];
    }
}
