<x-layouts::auth :title="__('Register')">
    <div class="flex flex-col gap-6">
        <div class="auth-form-shell">
            <x-auth-header :title="__('Create an account')" :description="__('Set up your workspace and start tracking companies, contacts and follow-ups with a cleaner workflow.')" />

            <div class="auth-form-note auth-form-note--soft">
                <span class="auth-form-note__label">What you get</span>
                <p class="auth-form-note__copy">A lightweight commercial workspace with visible next steps, interaction history and fewer dropped opportunities.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="text-left" :status="session('status')" />

            <form method="POST" action="{{ route('register.store') }}" class="auth-form-grid">
                @csrf

                <div class="auth-form-fieldset">
                    <p class="auth-form-fieldset__eyebrow">Profile</p>
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
                    <p class="auth-form-fieldset__eyebrow">Security</p>
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
                <span class="auth-side-facts__label">Self-hosted</span>
                <p class="auth-side-facts__copy">Own your pipeline, data and workflow from day one.</p>
            </div>
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">Built for execution</span>
                <p class="auth-side-facts__copy">Designed for teams who need clarity, not CRM bureaucracy.</p>
            </div>
        </div>
    </div>
</x-layouts::auth>
