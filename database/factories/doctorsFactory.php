<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\rooms;
use App\Models\addresses;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\doctors>
 */
class doctorsFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = rooms::pluck('id')->toArray();
        $addreses = addresses::pluck('id')->toArray();
 
        return [
            'name'      => fake()->firstName(),
            'lastname'  => fake()->lastName(),
            'pesel'     => fake()->pesel(),
            'phone'     => fake()->PhoneNumber(),
            'room_id'   => fake()->randomElement($rooms),
            'address_id'=> fake()->randomElement($addreses),
            
        ];
    }
}
