<?php

use App\Models\Company;
use App\Models\Contact;
use App\Models\FollowUp;
use App\Models\User;

test('app layout renders success flash messages', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $this->withSession(['success' => 'Empresa creada correctamente.'])
        ->get(route('dashboard'))
        ->assertOk()
        ->assertSee('Operación exitosa')
        ->assertSee('Empresa creada correctamente.');
});

test('company create renders the validation error alert after a failed submission', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $response = $this->followingRedirects()
        ->from(route('companies.create'))
        ->post(route('companies.store'), [
            'name' => '',
            'status' => 'invalid-status',
        ]);

    $response->assertOk();
    $response->assertSee('Revisá el formulario');
});

test('authenticated users can visit the contact create and edit pages', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();
    $contact = Contact::factory()->for($company)->create();

    $this->get(route('companies.contacts.create', $company))
        ->assertOk()
        ->assertSee('Nuevo contacto');

    $this->get(route('contacts.edit', $contact))
        ->assertOk()
        ->assertSee('Editar contacto');
});

test('authenticated users can visit the follow up create and edit pages', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create(['name' => 'Acme Search']);
    $followUp = FollowUp::factory()->for($company)->create();

    $this->get(route('follow-ups.create'))
        ->assertOk()
        ->assertSee('Nuevo follow-up')
        ->assertSee('Escribí el nombre de la empresa')
        ->assertSee('Acme Search');

    $this->get(route('follow-ups.edit', $followUp))
        ->assertOk()
        ->assertSee('Editar follow-up')
        ->assertSee('Acme Search')
        ->assertSee('Guardar cambios');
});

test('authenticated users can visit the follow up index page', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $this->get(route('follow-ups.index'))
        ->assertOk()
        ->assertSee('Control centralizado de tareas de seguimiento.')
        ->assertSee('Nuevo follow-up');
});
