<?php

use App\Models\User;

it('renders the landing page translations for each supported locale', function (string $locale, string $title, string $cta) {
    $response = $this
        ->withSession(['locale' => $locale])
        ->get(route('home'));

    $response
        ->assertOk()
        ->assertSee($title)
        ->assertSee($cta)
        ->assertSee(route('login'))
        ->assertSee('https://github.com/EzeArcich')
        ->assertSee('action="'.route('locale.switch', $locale).'"', false);
})->with([
    'spanish' => ['es', 'Dejá de perder negocios porque los seguimientos quedaron para después', 'Probar demo'],
    'english' => ['en', 'Stop losing deals because follow-ups were left for later', 'Try the demo'],
    'portuguese' => ['pt', 'Pare de perder negócios porque os follow-ups ficaram para depois', 'Testar demo'],
]);

it('stores the selected locale in session and redirects back', function () {
    $response = $this
        ->from(route('home'))
        ->post(route('locale.switch', 'en'));

    $response
        ->assertRedirect(route('home'))
        ->assertSessionHas('locale', 'en');

    $this->withSession(['locale' => 'en'])
        ->get(route('home'))
        ->assertSee('Stop losing deals because follow-ups were left for later')
        ->assertSee('Try the demo');
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
