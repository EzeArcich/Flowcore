<x-layouts::app :title="'Editar interacción · ' . $interaction->company->name">
    <div class="fc-page">
        <div class="fc-card max-w-3xl p-6 space-y-6">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Editar interacción</h1>
                    <p class="text-sm text-ink-500 dark:text-ink-400">
                        Empresa: <span class="font-medium">{{ $interaction->company->name }}</span>
                    </p>
                </div>
                <a href="{{ route('companies.show', $interaction->company) }}" class="fc-link">Volver a la empresa</a>
            </header>

            <form method="POST" action="{{ route('interactions.update', $interaction) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Contacto</label>
                        <select name="contact_id" class="fc-select">
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
                        <select name="direction" class="fc-select" required>
                            @foreach(['outbound','inbound'] as $direction)
                                <option value="{{ $direction }}" @selected(old('direction', $interaction->direction) === $direction)>{{ $direction }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Canal</label>
                        <select name="channel" class="fc-select" required>
                            @foreach(['email','linkedin','whatsapp','call','meeting'] as $channel)
                                <option value="{{ $channel }}" @selected(old('channel', $interaction->channel) === $channel)>{{ $channel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha y hora</label>
                        <input type="datetime-local" name="interacted_at"
                               value="{{ old('interacted_at', optional($interaction->interacted_at)->format('Y-m-d\TH:i')) }}" class="fc-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Asunto</label>
                    <input type="text" name="subject" value="{{ old('subject', $interaction->subject) }}" class="fc-input">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Mensaje enviado</label>
                    <textarea name="message" rows="4" class="fc-textarea">{{ old('message', $interaction->message) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Respuesta recibida</label>
                    <textarea name="response" rows="3" class="fc-textarea">{{ old('response', $interaction->response) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Resultado</label>
                        <input type="text" name="outcome" value="{{ old('outcome', $interaction->outcome) }}" class="fc-input">
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha de follow-up</label>
                        <input type="date" name="follow_up_due_at"
                               value="{{ old('follow_up_due_at', optional($interaction->follow_up_due_at)->toDateString()) }}" class="fc-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Notas internas</label>
                    <textarea name="notes" rows="3" class="fc-textarea">{{ old('notes', $interaction->notes) }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('companies.show', $interaction->company) }}" class="fc-btn fc-btn-secondary">Cancelar</a>
                    <button class="fc-btn fc-btn-primary">Guardar cambios</button>
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
                    trigger-class="fc-btn fc-btn-danger fc-btn-sm"
                    confirm-class="fc-btn fc-btn-danger"
                />
            </div>
        </div>
    </div>
</x-layouts::app>

