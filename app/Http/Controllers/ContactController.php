<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function create(Company $company): View
    {
        return view('contacts.create', compact('company'));
    }

    public function store(Request $request, Company $company): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'url'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'is_primary' => ['nullable', 'boolean'],
            'is_decision_maker' => ['nullable', 'boolean'],
            'status' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $company->contacts()->create($data);

        return redirect()
            ->route('companies.show', $company)
            ->with('success', 'Contacto creado correctamente.');
    }

    public function edit(Contact $contact): View
    {
        $contact->load('company');

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $data = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'url'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'is_primary' => ['nullable', 'boolean'],
            'is_decision_maker' => ['nullable', 'boolean'],
            'status' => ['required', 'string'],
            'notes' => ['nullable', 'string'],
        ]);

        $contact->update($data);

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