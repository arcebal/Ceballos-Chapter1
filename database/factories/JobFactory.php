<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;   // <-- this line is critical

    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement([
                '$50,000 USD',
                '$90,000 USD',
                '$150,000 USD'
            ]),
            'employer_id' => \App\Models\Employer::factory(),
        ];
    }
}
