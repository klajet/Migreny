<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\addresses>
 */
class addressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'road'      => fake()->streetName(),
            'number'    => random_int(1, random_int(1,22)),
            'city'      => fake()->city(),
            'cityCode'  => fake()->postcode(),
            'country'   => "Polska"
        ];
    }
}
