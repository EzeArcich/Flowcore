<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(Company $company): View
    {
        return view('contacts.create', compact('company'));
    }

    public function store(StoreContactRequest $request, Company $company): RedirectResponse
    {
        $company->contacts()->create($request->validated());

        return redirect()
            ->route('companies.show', $company)
            ->with('success', 'Contacto creado correctamente.');
    }

    public function edit(Contact $contact): View
    {
        $contact->load('company');

        return view('contacts.edit', compact('contact'));
    }

    public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
    {
        $contact->update($request->validated());

        return redirect()
            ->route('companies.show', $contact->company_id)
            ->with('success', 'Contacto actualizado correctamente.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $companyId = $contact->company_id;
        $contact->delete();

        return redirect()
            ->route('companies.show', $companyId)
            ->with('success', 'Contacto eliminado correctamente.');
    }
}
