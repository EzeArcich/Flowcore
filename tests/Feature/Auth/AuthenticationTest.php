<?php

use App\Models\User;
use Laravel\Fortify\Features;

test('login screen can be rendered', function () {
    $response = $this->get(route('login'));

    $response->assertOk();
});

it('renders the simple auth layout translations on login', function (string $locale, string $title, string $homeLabel, string $tagline) {
    $response = $this
        ->withSession(['locale' => $locale])
        ->get(route('login'));

    $response
        ->assertOk()
        ->assertSee($title)
        ->assertSee($homeLabel)
        ->assertSee($tagline)
        ->assertSee(__('auth.modal.login.kicker'))
        ->assertSee(__('auth.modal.login.fieldsets.credentials'))
        ->assertSee(__('auth.modal.login.alt_action.cta'));
})->with([
    'spanish' => ['es', 'Retomá el hilo y mantené cada oportunidad en movimiento.', 'Volver al sitio', 'Flowcore es donde los pipelines avanzan'],
    'english' => ['en', 'Pick the thread back up and keep every opportunity moving.', 'Back to site', 'Flowcore is where pipelines move forward'],
    'portuguese' => ['pt', 'Retome o fio e mantenha cada oportunidade em movimento.', 'Voltar ao site', 'Flowcore é onde os pipelines avançam'],
]);

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ]);

    $response->assertSessionHasErrorsIn('email');

    $this->assertGuest();
});

test('users with two factor enabled are redirected to two factor challenge', function () {
    $this->skipUnlessFortifyFeature(Features::twoFactorAuthentication());

    Features::twoFactorAuthentication([
        'confirm' => true,
        'confirmPassword' => true,
    ]);

    $user = User::factory()->withTwoFactor()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('two-factor.login'));
    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('logout'));

    $response->assertRedirect('/');

    $this->assertGuest();
});
