<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Advertisement::class;


    public function definition()
    {
        return [
            'product_id' => $this->faker->numerify,
            'title' => $this->faker->text,
            'valid_until' => $this->faker->date,
            'discount_percentage' => $this->faker->numerify
        ];


    }
}
