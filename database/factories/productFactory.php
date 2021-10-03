<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class productFactory extends Factory
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
            'prod_name'=>$this->faker->firstName(),
            'prod_price_now' =>$this->faker->numberBetween(100,500),
            'prod_prev_price' =>$this->faker->numberBetween(100,500),
            'prod_rating'=>$this->faker->numberBetween(1,5),
            'prod_new' =>$this->faker->numberBetween(0,1),
            'prod_image_name'=>$this->faker->name()          
        ];
    }
}
