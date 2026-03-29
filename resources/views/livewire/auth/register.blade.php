<x-layouts::auth :title="__('auth.modal.register.submit')">
    <div class="flex flex-col gap-6">
        <div class="auth-form-shell">
            <x-auth-header :title="__('auth.pages.register.header.title')" :description="__('auth.pages.register.header.description')" />

            <div class="auth-form-note auth-form-note--soft">
                <span class="auth-form-note__label">{{ __('auth.pages.register.note.label') }}</span>
                <p class="auth-form-note__copy">{{ __('auth.pages.register.note.copy') }}</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="text-left" :status="session('status')" />

            <form method="POST" action="{{ route('register.store') }}" class="auth-form-grid">
                @csrf

                <div class="auth-form-fieldset">
                    <p class="auth-form-fieldset__eyebrow">{{ __('auth.modal.register.fieldsets.profile') }}</p>
                    <div class="grid gap-5">
                        <flux:input
                            name="name"
                            :label="__('Name')"
                            :value="old('name')"
                            type="text"
                            required
                            autofocus
                            autocomplete="name"
                            :placeholder="__('Full name')"
                        />

                        <flux:input
                            name="email"
                            :label="__('Email address')"
                            :value="old('email')"
                            type="email"
                            required
                            autocomplete="email"
                            placeholder="email@example.com"
                        />
                    </div>
                </div>

                <div class="auth-form-fieldset">
                    <p class="auth-form-fieldset__eyebrow">{{ __('auth.modal.register.fieldsets.security') }}</p>
                    <div class="grid gap-5">
                        <flux:input
                            name="password"
                            :label="__('Password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('Password')"
                            viewable
                        />

                        <flux:input
                            name="password_confirmation"
                            :label="__('Confirm password')"
                            type="password"
                            required
                            autocomplete="new-password"
                            :placeholder="__('Confirm password')"
                            viewable
                        />
                    </div>
                </div>

                <div class="grid gap-3">
                    <flux:button type="submit" variant="primary" class="auth-submit-button w-full" data-test="register-user-button">
                        {{ __('Create account') }}
                    </flux:button>

                    <a href="{{ route('login') }}" class="auth-alt-action" wire:navigate>
                        <span>{{ __('Already have an account?') }}</span>
                        <strong>{{ __('Log in') }}</strong>
                    </a>
                </div>
            </form>
        </div>

            <div class="auth-side-facts">
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">{{ __('auth.pages.register.facts.ownership.label') }}</span>
                <p class="auth-side-facts__copy">{{ __('auth.pages.register.facts.ownership.copy') }}</p>
            </div>
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">{{ __('auth.pages.register.facts.execution.label') }}</span>
                <p class="auth-side-facts__copy">{{ __('auth.pages.register.facts.execution.copy') }}</p>
            </div>
        </div>
    </div>
</x-layouts::auth>
