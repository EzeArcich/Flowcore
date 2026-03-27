<x-layouts::app :title="'Nuevo contacto · ' . $company->name">
    <div class="crm-page space-y-6">
        <div class="crm-page-header flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="crm-page-eyebrow">Contacto</p>
                <h1 class="crm-page-title">Nuevo contacto</h1>
                <p class="crm-page-subtitle">
                    Empresa: <span class="font-semibold">{{ $company->name }}</span>
                </p>
            </div>

            <a href="{{ route('companies.show', $company) }}" class="crm-btn-secondary">Volver a la empresa</a>
        </div>

        <div class="crm-form-shell max-w-4xl">
            <form method="POST" action="{{ route('companies.contacts.store', $company) }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Identidad</p>
                            <h2 class="crm-block-title">Persona de contacto</h2>
                        </div>

                        <div>
                            <label class="crm-field-label">Nombre completo</label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}" class="crm-input" required>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="crm-field-label">Rol</label>
                                <input type="text" name="role" value="{{ old('role') }}" class="crm-input">
                            </div>

                            <div>
                                <label class="crm-field-label">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="crm-input">
                            </div>
                        </div>

                        <div>
                            <label class="crm-field-label">LinkedIn</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" class="crm-input">
                        </div>
                    </div>

                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Relación</p>
                            <h2 class="crm-block-title">Nivel de contacto</h2>
                        </div>

                        <div>
                            <label class="crm-field-label">Estado</label>
                            <select name="status" class="crm-select">
                                @foreach(['not_contacted','contacted','replied','unresponsive','invalid'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', 'not_contacted') === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <label class="crm-check-label">
                                <input type="checkbox" name="is_primary" value="1" class="crm-check" @checked(old('is_primary'))>
                                <span>Contacto principal</span>
                            </label>

                            <label class="crm-check-label">
                                <input type="checkbox" name="is_decision_maker" value="1" class="crm-check" @checked(old('is_decision_maker'))>
                                <span>Decision maker</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <a href="{{ route('companies.show', $company) }}" class="crm-btn-secondary">Cancelar</a>
                    <button class="crm-btn-primary">Guardar contacto</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
