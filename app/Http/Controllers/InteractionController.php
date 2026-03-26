<?php

namespace App\Http\Controllers;

use App\Http\Requests\Interaction\StoreInteractionRequest;
use App\Http\Requests\Interaction\UpdateInteractionRequest;
use App\Models\Company;
use App\Models\FollowUp;
use App\Models\Interaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InteractionController extends Controller
{
    public function timeline(Company $company): View
    {
        $interactions = $company->interactions()
            ->with('contact')
            ->latest('interacted_at')
            ->paginate(20);

        return view('interactions.timeline', compact('company', 'interactions'));
    }

    public function create(Company $company): View
    {
        $company->load('contacts');

        return view('interactions.create', compact('company'));
    }

    public function store(StoreInteractionRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

        $interaction = $company->interactions()->create($data);

        $company->update([
            'last_contact_at' => now()->toDateString(),
            'first_contact_at' => $company->first_contact_at ?: now()->toDateString(),
        ]);

        if (! empty($data['requires_follow_up']) && ! empty($data['follow_up_due_at'])) {
            FollowUp::create([
                'company_id' => $company->id,
                'contact_id' => $data['contact_id'] ?? null,
                'interaction_id' => $interaction->id,
                'due_date' => $data['follow_up_due_at'],
                'status' => 'pending',
                'reason' => 'manual',
                'notes' => 'Generado automáticamente desde interacción.',
            ]);

            $company->update([
                'next_follow_up_at' => $data['follow_up_due_at'],
            ]);
        }

        return redirect()
            ->route('companies.show', $company)
            ->with('success', 'Interacción registrada correctamente.');
    }

    public function edit(Interaction $interaction): View
    {
        $interaction->load('company.contacts');

        return view('interactions.edit', compact('interaction'));
    }

    public function update(UpdateInteractionRequest $request, Interaction $interaction): RedirectResponse
    {
        $interaction->update($request->validated());

        return redirect()
            ->route('companies.show', $interaction->company_id)
            ->with('success', 'Interacción actualizada correctamente.');
    }

    public function destroy(Interaction $interaction): RedirectResponse
    {
        $companyId = $interaction->company_id;
        $interaction->delete();

        return redirect()
            ->route('companies.show', $companyId)
            ->with('success', 'Interacción eliminada correctamente.');
    }
}
