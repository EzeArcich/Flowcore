<x-layouts::app :title="'Editar '.$company->name">
    <div class="crm-page space-y-6">
        <div class="crm-page-header flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="crm-page-eyebrow">Empresa</p>
                <h1 class="crm-page-title">Editar {{ $company->name }}</h1>
                <p class="crm-page-subtitle">
                    Actualizá los datos clave del lead, su estado comercial y el próximo seguimiento.
                </p>
            </div>

            <a href="{{ route('companies.show', $company) }}" class="crm-btn-secondary">
                Volver al detalle
            </a>
        </div>

        <div class="crm-card max-w-5xl p-6">
            <form method="POST" action="{{ route('companies.update', $company) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="mb-1 block text-sm font-medium">Nombre</label>
                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name', $company->name) }}"
                                class="crm-input"
                                required
                            >
                        </div>

                        <div>
                            <label for="website" class="mb-1 block text-sm font-medium">Sitio web</label>
                            <input
                                id="website"
                                type="text"
                                name="website"
                                value="{{ old('website', $company->website) }}"
                                class="crm-input"
                            >
                        </div>

                        <div>
                            <label for="industry" class="mb-1 block text-sm font-medium">Industria</label>
                            <input
                                id="industry"
                                type="text"
                                name="industry"
                                value="{{ old('industry', $company->industry) }}"
                                class="crm-input"
                            >
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="country" class="mb-1 block text-sm font-medium">País</label>
                                <input
                                    id="country"
                                    type="text"
                                    name="country"
                                    value="{{ old('country', $company->country) }}"
                                    class="crm-input"
                                >
                            </div>

                            <div>
                                <label for="city" class="mb-1 block text-sm font-medium">Ciudad</label>
                                <input
                                    id="city"
                                    type="text"
                                    name="city"
                                    value="{{ old('city', $company->city) }}"
                                    class="crm-input"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="company_size_min" class="mb-1 block text-sm font-medium">Equipo mínimo</label>
                                <input
                                    id="company_size_min"
                                    type="number"
                                    min="1"
                                    name="company_size_min"
                                    value="{{ old('company_size_min', $company->company_size_min) }}"
                                    class="crm-input"
                                >
                            </div>

                            <div>
                                <label for="company_size_max" class="mb-1 block text-sm font-medium">Equipo máximo</label>
                                <input
                                    id="company_size_max"
                                    type="number"
                                    min="1"
                                    name="company_size_max"
                                    value="{{ old('company_size_max', $company->company_size_max) }}"
                                    class="crm-input"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label for="status" class="mb-1 block text-sm font-medium">Estado comercial</label>
                            <select id="status" name="status" class="crm-select">
                                @foreach(['prospect','contacted','replied','meeting','proposal_sent','negotiation','won','lost','archived'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', $company->status) === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label for="first_contact_at" class="mb-1 block text-sm font-medium">Primer contacto</label>
                                <input
                                    id="first_contact_at"
                                    type="date"
                                    name="first_contact_at"
                                    value="{{ old('first_contact_at', $company->first_contact_at?->format('Y-m-d')) }}"
                                    class="crm-input"
                                >
                            </div>

                            <div>
                                <label for="last_contact_at" class="mb-1 block text-sm font-medium">Último contacto</label>
                                <input
                                    id="last_contact_at"
                                    type="date"
                                    name="last_contact_at"
                                    value="{{ old('last_contact_at', $company->last_contact_at?->format('Y-m-d')) }}"
                                    class="crm-input"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="next_follow_up_at" class="mb-1 block text-sm font-medium">Próximo follow-up</label>
                            <input
                                id="next_follow_up_at"
                                type="date"
                                name="next_follow_up_at"
                                value="{{ old('next_follow_up_at', $company->next_follow_up_at?->format('Y-m-d')) }}"
                                class="crm-input"
                            >
                        </div>

                        <div class="crm-surface-muted space-y-3">
                            <p class="crm-kpi-label">Visibilidad comercial</p>

                            <label class="inline-flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    name="is_priority"
                                    value="1"
                                    @checked(old('is_priority', $company->is_priority))
                                >
                                <span>Lead prioritario</span>
                            </label>

                            <label class="inline-flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    name="is_active"
                                    value="1"
                                    @checked(old('is_active', $company->is_active))
                                >
                                <span>Empresa activa</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="notes" class="mb-1 block text-sm font-medium">Notas</label>
                    <textarea
                        id="notes"
                        name="notes"
                        rows="6"
                        class="crm-textarea"
                    >{{ old('notes', $company->notes) }}</textarea>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <button type="submit" class="crm-btn-primary">Guardar cambios</button>
                    <a href="{{ route('companies.show', $company) }}" class="crm-btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
