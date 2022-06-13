<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected  $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'price'=> rand(100,200)
        ];
    }
}
