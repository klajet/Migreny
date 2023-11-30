<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\drugs;
use App\Models\prescriptions;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\presc_drugs>
 */
class presc_drugsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $drugs = drugs::pluck('id')->toArray();
        $prescriptions = prescriptions::pluck('id')->toArray();

        return [
            'drug_id' => fake()->randomElement($drugs),
            'presc_id' => fake()->randomElement($prescriptions)
        ];
    }
}
