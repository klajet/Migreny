<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\doctors;
use App\Models\patients;
use App\Models\prescriptions;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\visits>
 */
class visitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctors = doctors::pluck('id')->toArray();
        $patients = patients::pluck('id')->toArray();
        $prescriptions = prescriptions::pluck('id')->toArray();

        return [
            'visitDate' => fake()->dateTime(),
            'cost' => random_int(50, 600),
            'doctor_id' => fake()->randomElement($doctors),
            'patient_id' => fake()->randomElement($patients),
            'prescription_id' => fake()->randomElement($prescriptions),
        ];
    }
}
