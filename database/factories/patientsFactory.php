<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\doctors;
use App\Models\addresses;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\patients>
 */
class patientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctors = doctors::pluck('id')->toArray();
        $addresses = addresses::pluck('id')->toArray();
        
        return [
            'name'      => fake()->firstName(),
            'lastname'  => fake()->lastName(),
            'pesel'     => fake()->pesel(),
            'email'     => fake()->email(),
            'doctor_id'   => fake()->randomElement($doctors),
            'address_id'=> fake()->randomElement($addresses),
        ];
    }
}
