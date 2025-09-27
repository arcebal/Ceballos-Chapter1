<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(5),
            'salary' => $this->faker->numberBetween(30000, 120000), // ✅ Added salary
            'employer_id' => \App\Models\Employer::factory(),       // ✅ Ensure employer exists
        ];
    }
}
