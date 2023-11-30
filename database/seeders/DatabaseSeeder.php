<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $n = 1000;
        \App\Models\addresses::factory($n)->create();
        \App\Models\rooms::factory($n)->create();
        \App\Models\doctors::factory($n)->create();
        \App\Models\patients::factory($n)->create();
        \App\Models\drugs::factory($n)->create();
        \App\Models\prescriptions::factory($n)->create();
        \App\Models\presc_drugs::factory($n)->create();
        \App\Models\visits::factory($n)->create();
        

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
