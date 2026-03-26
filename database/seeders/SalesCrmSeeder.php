<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact;
use App\Models\Interaction;
use App\Models\Quotation;
use App\Models\FollowUp;
use Illuminate\Database\Seeder;

class SalesCrmSeeder extends Seeder
{
    public function run(): void
    {
        Company::factory()
            ->count(15)
            ->create()
            ->each(function (Company $company) {
                $contacts = Contact::factory()
                    ->count(rand(1, 3))
                    ->create([
                        'company_id' => $company->id,
                    ]);

                $interactionCount = rand(1, 4);

                foreach (range(1, $interactionCount) as $i) {
                    Interaction::factory()->create([
                        'company_id' => $company->id,
                        'contact_id' => $contacts->random()->id,
                    ]);
                }

                $quotationCount = rand(0, 2);

                if ($quotationCount > 0) {
                    foreach (range(1, $quotationCount) as $i) {
                        Quotation::factory()->create([
                            'company_id' => $company->id,
                            'contact_id' => $contacts->random()->id,
                        ]);
                    }
                }

                $followUpCount = rand(1, 3);

                foreach (range(1, $followUpCount) as $i) {
                    FollowUp::factory()->create([
                        'company_id' => $company->id,
                        'contact_id' => $contacts->random()->id,
                    ]);
                }
            });
    }
}
