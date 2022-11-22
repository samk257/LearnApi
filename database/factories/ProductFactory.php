<?php

namespace Database\Factories;

use App\Models\Product;
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
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "detail" => $this->faker->text(),
            "price" => $this->faker->numberBetween(100, 10000),
            "stock" => $this->faker->randomDigit,
            // "gender" => $this->faker->randomElement([
            //     "male",
            //     "female",
            //     "others"
            // ]),
            "discount" => $this->faker->numberBetween(2, 30)
        ];
    }
}
