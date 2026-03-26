<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuotationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'contact_id' => Contact::factory(),
            'title' => 'Propuesta ' . fake()->words(3, true),
            'pricing_type' => fake()->randomElement(['hourly', 'monthly', 'fixed_project', 'retainer']),
            'amount' => fake()->randomFloat(2, 100, 5000),
            'currency' => fake()->randomElement(['USD', 'ARS']),
            'estimated_hours' => fake()->numberBetween(10, 120),
            'sent_at' => fake()->dateTimeBetween('-15 days', 'now'),
            'valid_until' => fake()->dateTimeBetween('now', '+30 days'),
            'status' => fake()->randomElement(['draft', 'sent', 'viewed', 'negotiating']),
            'scope_summary' => fake()->paragraph(),
            'notes' => fake()->sentence(),
        ];
    }
}