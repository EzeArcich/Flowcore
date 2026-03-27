<x-layouts::app title="Nuevo follow-up">
    <div
        class="crm-page space-y-6"
        x-data="{
            companies: @js($companies->map(fn ($company) => [
                'id' => $company->id,
                'name' => $company->name,
                'status' => $company->status,
                'next_follow_up_at' => $company->next_follow_up_at?->format('Y-m-d'),
                'contacts' => $company->contacts->map(fn ($contact) => [
                    'id' => $contact->id,
                    'full_name' => $contact->full_name,
                    'role' => $contact->role,
                    'status' => $contact->status,
                ])->values(),
                'interactions' => $company->interactions->map(fn ($interaction) => [
                    'id' => $interaction->id,
                    'contact_id' => $interaction->contact_id,
                    'channel' => $interaction->channel,
                    'subject' => $interaction->subject,
                    'interacted_at' => optional($interaction->interacted_at)->format('d/m/Y H:i'),
                ])->values(),
                'quotations' => $company->quotations->map(fn ($quotation) => [
                    'id' => $quotation->id,
                    'contact_id' => $quotation->contact_id,
                    'title' => $quotation->title,
                    'status' => $quotation->status,
                    'sent_at' => optional($quotation->sent_at)->format('d/m/Y'),
                    'amount' => number_format((float) $quotation->amount, 2, ',', '.').' '.$quotation->currency,
                ])->values(),
            ])->values()),
            companyQuery: '',
            selectedCompanyId: @js(old('company_id')),
            selectedContactId: @js(old('contact_id')),
            selectedInteractionId: @js(old('interaction_id')),
            selectedQuotationId: @js(old('quotation_id')),
            init() {
                this.refreshCompanyQuery()
            },
            get selectedCompany() {
                return this.companies.find((company) => company.id === Number(this.selectedCompanyId)) ?? null
            },
            get availableContacts() {
                return this.selectedCompany ? this.selectedCompany.contacts : []
            },
            get availableInteractions() {
                if (! this.selectedCompany) {
                    return []
                }

                if (! this.selectedContactId) {
                    return this.selectedCompany.interactions
                }

                return this.selectedCompany.interactions.filter((interaction) => Number(interaction.contact_id) === Number(this.selectedContactId))
            },
            get availableQuotations() {
                if (! this.selectedCompany) {
                    return []
                }

                if (! this.selectedContactId) {
                    return this.selectedCompany.quotations
                }

                return this.selectedCompany.quotations.filter((quotation) => Number(quotation.contact_id) === Number(this.selectedContactId))
            },
            refreshCompanyQuery() {
                if (! this.selectedCompanyId) {
                    return
                }

                let selected = this.companies.find((company) => company.id === Number(this.selectedCompanyId))

                if (selected) {
                    this.companyQuery = selected.name
                }
            },
            syncCompanySelection() {
                let matched = this.companies.find((company) => company.name.toLowerCase() === this.companyQuery.trim().toLowerCase())
                let previousCompanyId = Number(this.selectedCompanyId || 0)

                this.selectedCompanyId = matched ? matched.id : ''

                if (! matched || previousCompanyId !== matched.id) {
                    this.selectedContactId = ''
                    this.selectedInteractionId = ''
                    this.selectedQuotationId = ''
                }
            },
            syncDependentSelections() {
                if (this.selectedContactId && ! this.availableContacts.some((contact) => contact.id === Number(this.selectedContactId))) {
                    this.selectedContactId = ''
                }

                if (this.selectedInteractionId && ! this.availableInteractions.some((interaction) => interaction.id === Number(this.selectedInteractionId))) {
                    this.selectedInteractionId = ''
                }

                if (this.selectedQuotationId && ! this.availableQuotations.some((quotation) => quotation.id === Number(this.selectedQuotationId))) {
                    this.selectedQuotationId = ''
                }
            }
        }"
    >
        <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="crm-kpi-label">Follow-up</p>
                <h1 class="text-2xl font-bold text-ink-900 dark:text-ink-50">Nuevo follow-up</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400">
                    Definí un recordatorio real de seguimiento, sin depender de IDs manuales ni combinaciones inconsistentes.
                </p>
            </div>

            <a href="{{ route('follow-ups.index') }}" class="crm-btn-secondary">Volver al listado</a>
        </div>

        <div class="crm-form-shell max-w-5xl">
            <form method="POST" action="{{ route('follow-ups.store') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Contexto</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Empresa y contacto</h2>
                        </div>

                        <div>
                            <label for="company_search" class="crm-field-label">Empresa</label>
                            <input
                                id="company_search"
                                x-model="companyQuery"
                                @input="syncCompanySelection()"
                                list="follow-up-company-options"
                                type="text"
                                class="crm-input"
                                placeholder="Escribí el nombre de la empresa"
                                autocomplete="off"
                                required
                            >
                            <input type="hidden" name="company_id" :value="selectedCompanyId">

                            <datalist id="follow-up-company-options">
                                <template x-for="company in companies" :key="company.id">
                                    <option :value="company.name"></option>
                                </template>
                            </datalist>

                            <p class="mt-2 text-xs text-ink-500 dark:text-ink-400">
                                Buscá por nombre y elegí una empresa existente.
                            </p>
                        </div>

                        <div x-show="selectedCompany" x-cloak class="crm-surface-muted space-y-2">
                            <p class="crm-kpi-label">Empresa seleccionada</p>
                            <p class="text-sm font-semibold text-ink-900 dark:text-ink-50" x-text="selectedCompany?.name"></p>
                            <p class="text-xs text-ink-500 dark:text-ink-400">
                                Estado:
                                <span x-text="selectedCompany?.status ?? '—'"></span>
                                · Próximo follow-up:
                                <span x-text="selectedCompany?.next_follow_up_at ?? '—'"></span>
                            </p>
                        </div>

                        <div>
                            <label for="contact_id" class="crm-field-label">Contacto</label>
                            <select
                                id="contact_id"
                                name="contact_id"
                                class="crm-select"
                                x-model="selectedContactId"
                                @change="syncDependentSelections()"
                                :disabled="! selectedCompany"
                            >
                                <option value="">Sin contacto específico</option>
                                <template x-for="contact in availableContacts" :key="contact.id">
                                    <option :value="contact.id" x-text="`${contact.full_name}${contact.role ? ' · ' + contact.role : ''}`"></option>
                                </template>
                            </select>
                            <p class="mt-2 text-xs text-ink-500 dark:text-ink-400">
                                Al elegir una empresa se cargan solo sus contactos.
                            </p>
                        </div>
                    </div>

                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Recordatorio</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Cuándo y por qué seguir</h2>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="due_date" class="crm-field-label">Fecha de vencimiento</label>
                                <input
                                    id="due_date"
                                    type="date"
                                    name="due_date"
                                    value="{{ old('due_date') }}"
                                    class="crm-input"
                                    required
                                >
                            </div>

                            <div>
                                <label for="status" class="crm-field-label">Estado</label>
                                <select id="status" name="status" class="crm-select" required>
                                    @foreach(['pending','done','skipped','cancelled'] as $status)
                                        <option value="{{ $status }}" @selected(old('status', 'pending') === $status)>{{ $status }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="reason" class="crm-field-label">Motivo</label>
                            <select id="reason" name="reason" class="crm-select">
                                @foreach(['initial_follow_up','proposal_follow_up','no_response','meeting_reminder','negotiation','manual','other'] as $reason)
                                    <option value="{{ $reason }}" @selected(old('reason', 'manual') === $reason)>{{ $reason }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="notes" class="crm-field-label">Notas</label>
                            <textarea id="notes" name="notes" rows="4" class="crm-textarea">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Asociación opcional</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Interacción</h2>
                        </div>

                        <div>
                            <label for="interaction_id" class="crm-field-label">Interacción vinculada</label>
                            <select
                                id="interaction_id"
                                name="interaction_id"
                                class="crm-select"
                                x-model="selectedInteractionId"
                                :disabled="! selectedCompany"
                            >
                                <option value="">No asociar interacción</option>
                                <template x-for="interaction in availableInteractions" :key="interaction.id">
                                    <option
                                        :value="interaction.id"
                                        x-text="`#${interaction.id} · ${interaction.channel}${interaction.interacted_at ? ' · ' + interaction.interacted_at : ''}${interaction.subject ? ' · ' + interaction.subject : ''}`"
                                    ></option>
                                </template>
                            </select>
                            <p class="mt-2 text-xs text-ink-500 dark:text-ink-400">
                                Solo es necesario si este seguimiento nace desde una interacción puntual.
                            </p>
                        </div>
                    </div>

                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Asociación opcional</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Cotización</h2>
                        </div>

                        <div>
                            <label for="quotation_id" class="crm-field-label">Cotización vinculada</label>
                            <select
                                id="quotation_id"
                                name="quotation_id"
                                class="crm-select"
                                x-model="selectedQuotationId"
                                :disabled="! selectedCompany"
                            >
                                <option value="">No asociar cotización</option>
                                <template x-for="quotation in availableQuotations" :key="quotation.id">
                                    <option
                                        :value="quotation.id"
                                        x-text="`#${quotation.id} · ${quotation.title}${quotation.status ? ' · ' + quotation.status : ''}${quotation.amount ? ' · ' + quotation.amount : ''}`"
                                    ></option>
                                </template>
                            </select>
                            <p class="mt-2 text-xs text-ink-500 dark:text-ink-400">
                                Es completamente opcional; usalo solo cuando el follow-up dependa de una propuesta enviada.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('follow-ups.index') }}" class="crm-btn-secondary">Cancelar</a>
                    <button class="crm-btn-primary">Guardar follow-up</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
