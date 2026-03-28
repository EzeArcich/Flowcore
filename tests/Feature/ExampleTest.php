<?php

use App\Models\User;

test('guests see the landing page at root', function () {
    $response = $this->get(route('home'));

    $response
        ->assertOk()
        ->assertSee('Stop losing deals because follow-ups were left for later')
        ->assertSee(route('login'))
        ->assertSee(route('register'))
        ->assertSee('Try the demo')
        ->assertSee('https://github.com/EzeArcich/followUp');
});

test('authenticated users are redirected from root to the dashboard', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('home'));

    $response->assertRedirect(route('dashboard'));
});

test('dashboard redirects guests to login', function () {
    $response = $this->get(route('dashboard'));

    $response->assertRedirect(route('login'));
});
