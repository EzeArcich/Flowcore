<?php

namespace App\Http\Requests\Quotation;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact_id' => ['nullable', 'exists:contacts,id'],
            'title' => ['required', 'string', 'max:255'],
            'pricing_type' => ['required', 'in:hourly,monthly,fixed_project,retainer'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'max:10'],
            'estimated_hours' => ['nullable', 'integer', 'min:1'],
            'sent_at' => ['nullable', 'date'],
            'valid_until' => ['nullable', 'date'],
            'status' => ['required', 'in:draft,sent,viewed,negotiating,accepted,rejected,expired'],
            'scope_summary' => ['nullable', 'string'],
            'notes' => ['nullable', 'string'],
        ];
    }
}