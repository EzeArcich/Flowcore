<?php

namespace App\Http\Requests\Interaction;

use Illuminate\Foundation\Http\FormRequest;

class StoreInteractionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact_id' => ['nullable', 'exists:contacts,id'],
            'direction' => ['required', 'in:outbound,inbound'],
            'channel' => ['required', 'in:email,linkedin,whatsapp,phone,meeting,website_form,other'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
            'response' => ['nullable', 'string'],
            'interacted_at' => ['required', 'date'],
            'requires_follow_up' => ['nullable', 'boolean'],
            'follow_up_due_at' => ['nullable', 'date'],
            'outcome' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
        ];
    }
}