<x-layouts::app :title="'Nueva interacción · ' . $company->name">
    <div class="crm-page">
        <div class="crm-card max-w-3xl p-6 space-y-6">
            <header class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-semibold text-ink-900 dark:text-ink-50">Nueva interacción</h1>
                    <p class="text-sm text-ink-500 dark:text-ink-400">
                        Empresa: <span class="font-medium">{{ $company->name }}</span>
                    </p>
                </div>
                <a href="{{ route('companies.show', $company) }}" class="crm-link">Volver a la empresa</a>
            </header>

            <form method="POST" action="{{ route('companies.interactions.store', $company) }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Contacto</label>
                        <select name="contact_id" class="crm-select">
                            <option value="">Sin contacto específico</option>
                            @foreach($company->contacts as $contact)
                                <option value="{{ $contact->id }}" @selected(old('contact_id') == $contact->id)>
                                    {{ $contact->full_name }} ({{ $contact->role }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Dirección</label>
                        <select name="direction" class="crm-select" required>
                            @foreach(['outbound','inbound'] as $direction)
                                <option value="{{ $direction }}" @selected(old('direction', 'outbound') === $direction)>{{ $direction }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Canal</label>
                        <select name="channel" class="crm-select" required>
                            @foreach(['email','linkedin','whatsapp','call','meeting'] as $channel)
                                <option value="{{ $channel }}" @selected(old('channel') === $channel)>{{ $channel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1">Fecha y hora</label>
                        <input type="datetime-local" name="interacted_at"
                               value="{{ old('interacted_at') }}" class="crm-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Asunto</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="crm-input">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Mensaje enviado</label>
                    <textarea name="message" rows="4" class="crm-textarea">{{ old('message') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Respuesta recibida</label>
                    <textarea name="response" rows="3" class="crm-textarea">{{ old('response') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1">Resultado</label>
                        <input type="text" name="outcome" value="{{ old('outcome') }}" class="crm-input">
                    </div>

                    <div class="space-y-2">
                        <label class="inline-flex items-center gap-2 mt-6">
                            <input type="checkbox" name="requires_follow_up" value="1" @checked(old('requires_follow_up'))>
                            <span class="text-sm">Generar follow-up</span>
                        </label>
                        <input type="date" name="follow_up_due_at"
                               value="{{ old('follow_up_due_at') }}" class="crm-input" placeholder="Fecha de follow-up">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Notas internas</label>
                    <textarea name="notes" rows="3" class="crm-textarea">{{ old('notes') }}</textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('companies.show', $company) }}" class="crm-btn-secondary">Cancelar</a>
                    <button class="crm-btn-primary">Registrar interacción</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>

