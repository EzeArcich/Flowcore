<?php

use Laravel\Fortify\Features;

beforeEach(function () {
    $this->skipUnlessFortifyFeature(Features::registration());
});

test('registration screen can be rendered', function () {
    $response = $this->get(route('register'));

    $response->assertOk();
});

it('renders the simple auth layout translations on register', function (string $locale, string $title) {
    $response = $this
        ->withSession(['locale' => $locale])
        ->get(route('register'));

    $response
        ->assertOk()
        ->assertSee($title)
        ->assertSee(__('auth.layout.showcase.points.connected'))
        ->assertSee(__('auth.modal.register.kicker'))
        ->assertSee(__('auth.modal.register.fieldsets.profile'))
        ->assertSee(__('auth.modal.register.submit'));
})->with([
    'spanish' => ['es', 'Creá una cuenta y empezá a gestionar seguimientos con estructura.'],
    'english' => ['en', 'Create an account and start managing follow-ups with structure.'],
    'portuguese' => ['pt', 'Crie uma conta e comece a gerenciar follow-ups com estrutura.'],
]);

test('new users can register', function () {
    $response = $this->post(route('register.store'), [
        'name' => 'John Doe',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $response->assertSessionHasNoErrors()
        ->assertRedirect(route('dashboard', absolute: false));

    $this->assertAuthenticated();
});
