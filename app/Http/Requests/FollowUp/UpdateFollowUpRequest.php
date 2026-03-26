<?php

namespace App\Http\Requests\FollowUp;

class UpdateFollowUpRequest extends StoreFollowUpRequest
{
    public function rules(): array
    {
        return [
            'due_date' => ['required', 'date'],
            'status' => ['required', 'in:pending,done,skipped,cancelled'],
            'reason' => ['required', 'in:initial_follow_up,proposal_follow_up,no_response,meeting_reminder,negotiation,manual,other'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
