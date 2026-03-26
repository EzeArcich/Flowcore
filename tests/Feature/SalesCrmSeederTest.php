<?php

use App\Models\Company;
use App\Models\Contact;
use App\Models\FollowUp;
use App\Models\Interaction;
use App\Models\Quotation;
use Database\Seeders\SalesCrmSeeder;

test('sales crm seeder populates the core crm entities', function () {
    $this->seed(SalesCrmSeeder::class);

    expect(Company::count())->toBe(15)
        ->and(Company::has('contacts')->count())->toBe(15)
        ->and(Company::has('interactions')->count())->toBe(15)
        ->and(Company::has('followUps')->count())->toBe(15)
        ->and(Contact::count())->toBeGreaterThan(0)
        ->and(Interaction::count())->toBeGreaterThan(0)
        ->and(Quotation::query()->whereNotNull('company_id')->count())->toBe(Quotation::count())
        ->and(FollowUp::count())->toBeGreaterThanOrEqual(15);
});
