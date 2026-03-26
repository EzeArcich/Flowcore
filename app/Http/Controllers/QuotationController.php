<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Quotation;
use App\Models\FollowUp;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class QuotationController extends Controller
{
    public function create(Company $company): View
    {
        $company->load('contacts');

        return view('quotations.create', compact('company'));
    }

    public function store(Request $request, Company $company): RedirectResponse
    {
        $data = $request->validate([
            'contact_id' => ['nullable', 'exists:contacts,id'],
            'title' => ['required', 'string', 'max:255'],
            'pricing_type' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'max:10'],
            'estimated_hours' => ['nullable', 'integer', 'min:1'],
            'sent_at' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date'],
            'status' => ['required', 'string'],
            'scope_summary' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $quotation = $company->quotations()->create($data);

        if (($data['status'] ?? null) === 'sent') {
            FollowUp::create([
                'company_id' => $company->id,
                'contact_id' => $data['contact_id'] ?? null,
                'quotation_id' => $quotation->id,
                'due_date' => now()->addDays(5)->toDateString(),
                'status' => 'pending',
                'reason' => 'proposal_follow_up',
                'notes' => 'Follow-up automático luego de enviar propuesta.',
            ]);

            $company->update([
                'status' => 'proposal_sent',
                'next_follow_up_at' => now()->addDays(5)->toDateString(),
            ]);
        }

        return redirect()
            ->route('companies.show', $company)
            ->with('success', 'Cotización registrada correctamente.');
    }

    public function edit(Quotation $quotation): View
    {
        $quotation->load('company.contacts');

        return view('quotations.edit', compact('quotation'));
    }

    public function update(Request $request, Quotation $quotation): RedirectResponse
    {
        $data = $request->validate([
            'contact_id' => ['nullable', 'exists:contacts,id'],
            'title' => ['required', 'string', 'max:255'],
            'pricing_type' => ['required', 'string'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'max:10'],
            'estimated_hours' => ['nullable', 'integer', 'min:1'],
            'sent_at' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date'],
            'status' => ['required', 'string'],
            'scope_summary' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $quotation->update($data);

        return redirect()
            ->route('companies.show', $quotation->company_id)
            ->with('success', 'Cotización actualizada correctamente.');
    }

    public function destroy(Quotation $quotation): RedirectResponse
    {
        $companyId = $quotation->company_id;
        $quotation->delete();

        return redirect()
            ->route('companies.show', $companyId)
            ->with('success', 'Cotización eliminada correctamente.');
    }
}