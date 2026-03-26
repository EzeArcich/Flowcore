<?php

use App\Models\Company;
use App\Models\User;

test('authenticated users can visit the companies index page', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $this->get(route('companies.index'))->assertOk();
});

test('authenticated users can visit the company create page', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $this->get(route('companies.create'))->assertOk();
});

test('authenticated users can visit the company show page', function () {
    $this->withoutVite();
    $this->actingAs(User::factory()->create());

    $company = Company::factory()->create();

    $this->get(route('companies.show', $company))->assertOk();
});
