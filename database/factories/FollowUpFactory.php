<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowUpFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'contact_id' => Contact::factory(),
            'interaction_id' => null,
            'quotation_id' => null,
            'due_date' => fake()->dateTimeBetween('-5 days', '+10 days'),
            'status' => fake()->randomElement(['pending', 'done', 'skipped']),
            'reason' => fake()->randomElement(['initial_follow_up', 'proposal_follow_up', 'no_response', 'manual']),
            'notes' => fake()->sentence(),
            'completed_at' => fake()->optional()->dateTimeBetween('-5 days', 'now'),
        ];
    }
}