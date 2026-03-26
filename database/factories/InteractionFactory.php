<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class InteractionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'contact_id' => Contact::factory(),
            'direction' => fake()->randomElement(['outbound', 'inbound']),
            'channel' => fake()->randomElement(['email', 'linkedin', 'whatsapp', 'meeting']),
            'subject' => fake()->sentence(4),
            'message' => fake()->paragraph(),
            'response' => fake()->optional()->paragraph(),
            'interacted_at' => fake()->dateTimeBetween('-30 days', 'now'),
            'requires_follow_up' => fake()->boolean(50),
            'follow_up_due_at' => fake()->optional()->dateTimeBetween('now', '+10 days'),
            'outcome' => fake()->randomElement(['positive', 'no response', 'booked call', 'interested']),
            'notes' => fake()->sentence(),
        ];
    }
}