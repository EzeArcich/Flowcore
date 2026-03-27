<x-layouts::app :title="'Editar interacción · ' . $interaction->company->name">
    <div class="crm-page">
        <div class="crm-card max-w-3xl p-6 space-y-6">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Editar interacción</h1>
                    <p class="text-sm text-ink-500 dark:text-ink-400">
                        Empresa: <span class="font-medium">{{ $interaction->company->name }}</span>
                    </p>
                </div>
                <a href="{{ route('companies.show', $interaction->company) }}" class="crm-link">Volver a la empresa</a>
            </header>

            <form method="POST" action="{{ route('interactions.update', $interaction) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Contacto</label>
                        <select name="contact_id" class="crm-select">
                            <option value="">Sin contacto específico</option>
                            @foreach($interaction->company->contacts as $contact)
                                <option value="{{ $contact->id }}" @selected(old('contact_id', $interaction->contact_id) == $contact->id)>
                                    {{ $contact->full_name }} ({{ $contact->role }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Dirección</label>
                        <select name="direction" class="crm-select" required>
                            @foreach(['outbound','inbound'] as $direction)
                                <option value="{{ $direction }}" @selected(old('direction', $interaction->direction) === $direction)>{{ $direction }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Canal</label>
                        <select name="channel" class="crm-select" required>
                            @foreach(['email','linkedin','whatsapp','call','meeting'] as $channel)
                                <option value="{{ $channel }}" @selected(old('channel', $interaction->channel) === $channel)>{{ $channel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha y hora</label>
                        <input type="datetime-local" name="interacted_at"
                               value="{{ old('interacted_at', optional($interaction->interacted_at)->format('Y-m-d\TH:i')) }}" class="crm-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Asunto</label>
                    <input type="text" name="subject" value="{{ old('subject', $interaction->subject) }}" class="crm-input">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Mensaje enviado</label>
                    <textarea name="message" rows="4" class="crm-textarea">{{ old('message', $interaction->message) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Respuesta recibida</label>
                    <textarea name="response" rows="3" class="crm-textarea">{{ old('response', $interaction->response) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Resultado</label>
                        <input type="text" name="outcome" value="{{ old('outcome', $interaction->outcome) }}" class="crm-input">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha de follow-up</label>
                        <input type="date" name="follow_up_due_at"
                               value="{{ old('follow_up_due_at', optional($interaction->follow_up_due_at)->toDateString()) }}" class="crm-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Notas internas</label>
                    <textarea name="notes" rows="3" class="crm-textarea">{{ old('notes', $interaction->notes) }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('companies.show', $interaction->company) }}" class="crm-btn-secondary">Cancelar</a>
                    <button class="crm-btn-primary">Guardar cambios</button>
                </div>
            </form>

            <div class="border-t border-ink-100 pt-4 dark:border-ink-800">
                <x-crm.confirm-action
                    :action="route('interactions.destroy', $interaction)"
                    method="DELETE"
                    title="Eliminar interacción"
                    message="Esta acción eliminará la interacción y su contexto histórico."
                    trigger-label="Eliminar interacción"
                    confirm-label="Sí, eliminar"
                    trigger-class="crm-btn-danger crm-btn-sm"
                    confirm-class="crm-btn-danger"
                />
            </div>
        </div>
    </div>
</x-layouts::app>

