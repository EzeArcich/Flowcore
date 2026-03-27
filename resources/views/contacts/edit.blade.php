<x-layouts::app :title="'Editar contacto · ' . $contact->full_name">
    <div class="crm-page space-y-6">
        <div class="flex flex-col gap-2 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="crm-kpi-label">Contacto</p>
                <h1 class="text-2xl font-bold text-ink-900 dark:text-ink-50">Editar contacto</h1>
                <p class="text-sm text-ink-500 dark:text-ink-400">
                    Empresa: <span class="font-semibold">{{ $contact->company->name }}</span>
                </p>
            </div>

            <a href="{{ route('companies.show', $contact->company) }}" class="crm-btn-secondary">Volver a la empresa</a>
        </div>

        <div class="crm-form-shell max-w-4xl">
            <form method="POST" action="{{ route('contacts.update', $contact) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Identidad</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Persona de contacto</h2>
                        </div>

                        <div>
                            <label class="crm-field-label">Nombre completo</label>
                            <input type="text" name="full_name" value="{{ old('full_name', $contact->full_name) }}" class="crm-input" required>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                            <div>
                                <label class="crm-field-label">Rol</label>
                                <input type="text" name="role" value="{{ old('role', $contact->role) }}" class="crm-input">
                            </div>

                            <div>
                                <label class="crm-field-label">Email</label>
                                <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="crm-input">
                            </div>
                        </div>

                        <div>
                            <label class="crm-field-label">LinkedIn</label>
                            <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $contact->linkedin_url) }}" class="crm-input">
                        </div>
                    </div>

                    <div class="crm-form-section space-y-4">
                        <div>
                            <p class="crm-kpi-label">Relación</p>
                            <h2 class="text-lg font-bold text-ink-900 dark:text-ink-50">Nivel de contacto</h2>
                        </div>

                        <div>
                            <label class="crm-field-label">Estado</label>
                            <select name="status" class="crm-select">
                                @foreach(['not_contacted','contacted','replied','unresponsive','invalid'] as $status)
                                    <option value="{{ $status }}" @selected(old('status', $contact->status) === $status)>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-1 gap-3">
                            <label class="crm-check-label">
                                <input type="checkbox" name="is_primary" value="1" class="crm-check" @checked(old('is_primary', $contact->is_primary))>
                                <span>Contacto principal</span>
                            </label>

                            <label class="crm-check-label">
                                <input type="checkbox" name="is_decision_maker" value="1" class="crm-check" @checked(old('is_decision_maker', $contact->is_decision_maker))>
                                <span>Decision maker</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('companies.show', $contact->company) }}" class="crm-btn-secondary">Cancelar</a>
                    <button class="crm-btn-primary">Guardar cambios</button>
                </div>
            </form>

            <div class="border-t border-ink-100 pt-4 dark:border-ink-800">
                <x-crm.confirm-action
                    :action="route('contacts.destroy', $contact)"
                    method="DELETE"
                    title="Eliminar contacto"
                    message="Esta acción eliminará el contacto de forma permanente."
                    trigger-label="Eliminar contacto"
                    confirm-label="Sí, eliminar"
                    trigger-class="crm-btn-danger crm-btn-sm"
                    confirm-class="crm-btn-danger"
                />
            </div>
        </div>
    </div>
</x-layouts::app>
