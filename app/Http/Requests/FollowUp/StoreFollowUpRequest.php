<?php

namespace App\Http\Requests\FollowUp;

use Illuminate\Foundation\Http\FormRequest;

class StoreFollowUpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_id' => ['required', 'exists:companies,id'],
            'contact_id' => ['nullable', 'exists:contacts,id'],
            'interaction_id' => ['nullable', 'exists:interactions,id'],
            'quotation_id' => ['nullable', 'exists:quotations,id'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'in:pending,done,skipped,cancelled'],
            'reason' => ['required', 'in:initial_follow_up,proposal_follow_up,no_response,meeting_reminder,negotiation,manual,other'],
            'notes' => ['nullable', 'string'],
        ];
    }
}