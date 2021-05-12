<?php

namespace Database\Factories;

use App\Models\Ratings;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ratings::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rate' => $this->faker->numerify('#'),
            'rateBy' => $this->faker->numerify('#'),
            'product_id' => $this->faker->numerify('#')
        ];
    }
}
