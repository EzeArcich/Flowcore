<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quotation\StoreQuotationRequest;
use App\Http\Requests\Quotation\UpdateQuotationRequest;
use App\Models\Company;
use App\Models\FollowUp;
use App\Models\Quotation;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class QuotationController extends Controller
{
    public function create(Company $company): View
    {
        $company->load('contacts');

        return view('quotations.create', compact('company'));
    }

    public function store(StoreQuotationRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

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

    public function update(UpdateQuotationRequest $request, Quotation $quotation): RedirectResponse
    {
        $quotation->update($request->validated());

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
