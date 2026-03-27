<?php

use App\Models\FollowUp;
use App\Models\User;

test('guests are redirected to the login page', function () {
    $this->withoutVite();

    $response = $this->get(route('dashboard'));
    $response->assertRedirect(route('login'));
});

test('authenticated users can visit the dashboard', function () {
    $this->withoutVite();

    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get(route('dashboard'));
    $response->assertOk();
});

test('dashboard follow-up cards link to the follow-up detail view', function () {
    $this->withoutVite();

    $user = User::factory()->create();
    $this->actingAs($user);

    $followUp = FollowUp::factory()->create([
        'status' => 'pending',
        'due_date' => now()->toDateString(),
    ]);

    $response = $this->get(route('dashboard'));

    $response->assertOk();
    $response->assertSee(route('follow-ups.edit', $followUp), false);
    $response->assertSee('Ver');
});
