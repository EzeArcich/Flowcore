<?php

use App\Models\Company;
use App\Models\Contact;
use App\Models\FollowUp;
use App\Models\User;

test('contact store uses the contact form request validation rules', function () {
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();

    $response = $this->from(route('companies.show', $company))
        ->post(route('companies.contacts.store', $company), [
            'full_name' => '',
            'status' => 'invalid-status',
        ]);

    $response->assertRedirect(route('companies.show', $company));
    $response->assertSessionHasErrors(['full_name', 'status']);
});

test('interaction store uses the interaction form request validation rules', function () {
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();
    $contact = Contact::factory()->for($company)->create();

    $response = $this->from(route('companies.show', $company))
        ->post(route('companies.interactions.store', $company), [
            'contact_id' => $contact->id,
            'direction' => 'sideways',
            'channel' => 'fax',
            'interacted_at' => 'not-a-date',
        ]);

    $response->assertRedirect(route('companies.show', $company));
    $response->assertSessionHasErrors(['direction', 'channel', 'interacted_at']);
});

test('quotation store uses the quotation form request validation rules', function () {
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();

    $response = $this->from(route('companies.show', $company))
        ->post(route('companies.quotations.store', $company), [
            'title' => '',
            'pricing_type' => 'daily',
            'amount' => -1,
            'currency' => '',
            'status' => 'queued',
        ]);

    $response->assertRedirect(route('companies.show', $company));
    $response->assertSessionHasErrors(['title', 'pricing_type', 'amount', 'currency', 'status']);
});

test('follow up update uses the update form request rules without requiring creation-only fields', function () {
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();
    $contact = Contact::factory()->for($company)->create();
    $followUp = FollowUp::factory()->create([
        'company_id' => $company->id,
        'contact_id' => $contact->id,
        'interaction_id' => null,
        'quotation_id' => null,
    ]);

    $response = $this->from(route('follow-ups.index'))
        ->put(route('follow-ups.update', $followUp), [
            'company_id' => $followUp->company_id,
            'contact_id' => $followUp->contact_id,
            'interaction_id' => $followUp->interaction_id,
            'quotation_id' => $followUp->quotation_id,
            'due_date' => now()->addDay()->toDateString(),
            'status' => 'done',
            'reason' => 'manual',
            'notes' => 'Updated from test.',
        ]);

    $response->assertRedirect(route('follow-ups.index'));
    $response->assertSessionHasNoErrors();
});

test('follow up store rejects contacts that do not belong to the selected company', function () {
    $this->actingAs(User::factory()->create());

    $selectedCompany = Company::factory()->create();
    $foreignContact = Contact::factory()->create();

    $response = $this->from(route('follow-ups.create'))
        ->post(route('follow-ups.store'), [
            'company_id' => $selectedCompany->id,
            'contact_id' => $foreignContact->id,
            'due_date' => now()->addDays(4)->toDateString(),
            'status' => 'pending',
            'reason' => 'manual',
        ]);

    $response->assertRedirect(route('follow-ups.create'));
    $response->assertSessionHasErrors('contact_id');
});
