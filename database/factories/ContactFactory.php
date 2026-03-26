<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'full_name' => fake()->name(),
            'role' => fake()->randomElement(['CEO', 'CTO', 'Recruiter', 'HR', 'Founder']),
            'email' => fake()->safeEmail(),
            'linkedin_url' => 'https://linkedin.com/in/' . fake()->slug(),
            'phone' => fake()->phoneNumber(),
            'whatsapp' => fake()->phoneNumber(),
            'is_primary' => fake()->boolean(25),
            'is_decision_maker' => fake()->boolean(40),
            'status' => fake()->randomElement(['not_contacted', 'contacted', 'replied']),
            'notes' => fake()->sentence(),
        ];
    }
}