<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:500'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'is_primary' => ['nullable', 'boolean'],
            'is_decision_maker' => ['nullable', 'boolean'],
            'status' => ['required', 'in:not_contacted,contacted,replied,unresponsive,invalid'],
            'notes' => ['nullable', 'string'],
        ];
    }
}