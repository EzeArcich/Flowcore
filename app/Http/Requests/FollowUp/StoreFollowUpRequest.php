<?php

namespace App\Http\Requests\FollowUp;

use App\Models\Contact;
use App\Models\Interaction;
use App\Models\Quotation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

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

    public function after(): array
    {
        return [
            function (Validator $validator): void {
                $companyId = $this->integer('company_id');
                $contactId = $this->integer('contact_id');
                $interactionId = $this->integer('interaction_id');
                $quotationId = $this->integer('quotation_id');

                if ($contactId > 0) {
                    $contactBelongsToCompany = Contact::query()
                        ->whereKey($contactId)
                        ->where('company_id', $companyId)
                        ->exists();

                    if (! $contactBelongsToCompany) {
                        $validator->errors()->add('contact_id', 'El contacto seleccionado no pertenece a la empresa indicada.');
                    }
                }

                if ($interactionId > 0) {
                    $interaction = Interaction::query()
                        ->select(['company_id', 'contact_id'])
                        ->find($interactionId);

                    if (! $interaction || $interaction->company_id !== $companyId) {
                        $validator->errors()->add('interaction_id', 'La interacción seleccionada no pertenece a la empresa indicada.');
                    }

                    if ($interaction && $contactId > 0 && $interaction->contact_id && $interaction->contact_id !== $contactId) {
                        $validator->errors()->add('interaction_id', 'La interacción seleccionada no coincide con el contacto indicado.');
                    }
                }

                if ($quotationId > 0) {
                    $quotation = Quotation::query()
                        ->select(['company_id', 'contact_id'])
                        ->find($quotationId);

                    if (! $quotation || $quotation->company_id !== $companyId) {
                        $validator->errors()->add('quotation_id', 'La cotización seleccionada no pertenece a la empresa indicada.');
                    }

                    if ($quotation && $contactId > 0 && $quotation->contact_id && $quotation->contact_id !== $contactId) {
                        $validator->errors()->add('quotation_id', 'La cotización seleccionada no coincide con el contacto indicado.');
                    }
                }
            },
        ];
    }
}
