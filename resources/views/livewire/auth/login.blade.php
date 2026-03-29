<x-layouts::auth :title="__('auth.modal.toggle.login')">
    <div class="flex flex-col gap-6">
        <div class="auth-form-shell">
            <x-auth-header :title="__('auth.pages.login.header.title')" :description="__('auth.pages.login.header.description')" />

            <div class="auth-form-note">
                <span class="auth-form-note__label">{{ __('auth.pages.login.note.label') }}</span>
                <p class="auth-form-note__copy">{{ __('auth.pages.login.note.copy') }}</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="text-left" :status="session('status')" />

            <form method="POST" action="{{ route('login.store') }}" class="auth-form-grid">
                @csrf

                <div class="auth-form-fieldset">
                    <p class="auth-form-fieldset__eyebrow">Credentials</p>
                    <div class="grid gap-5">
                        <flux:input
                            name="email"
                            :label="__('Email address')"
                            :value="old('email')"
                            type="email"
                            required
                            autofocus
                            autocomplete="email"
                            placeholder="email@example.com"
                        />

                        <div class="relative">
                            <flux:input
                                name="password"
                                :label="__('Password')"
                                type="password"
                                required
                                autocomplete="current-password"
                                :placeholder="__('Password')"
                                viewable
                            />

                            @if (Route::has('password.request'))
                                <flux:link class="absolute end-0 top-0 text-sm font-medium text-brand-700 hover:text-brand-800" :href="route('password.request')" wire:navigate>
                                    {{ __('Forgot your password?') }}
                                </flux:link>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="auth-form-row">
                    <flux:checkbox name="remember" :label="__('Remember me')" :checked="old('remember')" />
                    <span class="auth-form-row__meta">{{ __('auth.modal.login.resume_faster') }}</span>
                </div>

                <div class="grid gap-3">
                    <flux:button variant="primary" type="submit" class="auth-submit-button w-full" data-test="login-button">
                        {{ __('Log in') }}
                    </flux:button>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="auth-alt-action" wire:navigate>
                            <span>{{ __('Don\'t have an account?') }}</span>
                            <strong>{{ __('Create one now') }}</strong>
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="auth-side-facts">
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">{{ __('auth.pages.login.facts.daily_focus.label') }}</span>
                <p class="auth-side-facts__copy">{{ __('auth.pages.login.facts.daily_focus.copy') }}</p>
            </div>
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">{{ __('auth.pages.login.facts.context.label') }}</span>
                <p class="auth-side-facts__copy">{{ __('auth.pages.login.facts.context.copy') }}</p>
            </div>
        </div>
    </div>
</x-layouts::auth>
