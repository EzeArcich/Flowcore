<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition(): array
    {
        $statuses = ['prospect', 'contacted', 'replied', 'meeting', 'proposal_sent', 'negotiation'];

        return [
            'name' => fake()->company(),
            'website' => fake()->url(),
            'industry' => fake()->randomElement(['Software', 'Marketing', 'Ecommerce', 'Real Estate', 'Health']),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'company_size_min' => fake()->randomElement([1, 5, 10, 20]),
            'company_size_max' => fake()->randomElement([10, 20, 50, 100]),
            'notes' => fake()->paragraph(),
            'status' => fake()->randomElement($statuses),
            'first_contact_at' => fake()->dateTimeBetween('-60 days', '-20 days'),
            'last_contact_at' => fake()->dateTimeBetween('-15 days', 'now'),
            'next_follow_up_at' => fake()->dateTimeBetween('now', '+15 days'),
            'is_priority' => fake()->boolean(30),
            'is_active' => true,
        ];
    }
}