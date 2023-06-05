<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->Name,
            'Description' => $this->faker->sentence,
            'SKU' => $this->faker->unique()->numberBetween(1000, 9999),
            'instock_Quantity' => $this->faker->numberBetween(1, 100),
            'regular_price' => $this->faker->randomFloat(2, 10, 100),
            'sale_price' => $this->faker->randomFloat(2, 5, 50),
            'active' => $this->faker->randomElement(['YES', 'NO']),
            'brand' => $this->faker->word,
            'category' => $this->faker->randomElement(['PRODUCE', 'DAIRY', 'FROZEN VEGGIES']),
        ];
    }
}
