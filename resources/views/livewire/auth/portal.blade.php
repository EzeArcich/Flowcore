@php
    $isRegister = ($mode ?? 'login') === 'register';
@endphp

<x-layouts::auth :title="$isRegister ? __('Register') : __('Log in')">
    <div
        x-data="{
            mode: @js($isRegister ? 'register' : 'login'),
            setMode(nextMode) {
                this.mode = nextMode;
                history.replaceState({}, '', nextMode === 'register' ? @js(route('register')) : @js(route('login')));
            },
        }"
        class="flex flex-col gap-6"
    >
        <div class="auth-form-shell">
            <div class="auth-header-stack">
                <div class="auth-header-stack__copy" x-show="mode === 'login'" x-transition.opacity.duration.250ms>
                    <x-auth-header
                        :title="__('Log in to your account')"
                        :description="__('Pick up your pipeline where you left it, with every next step and conversation in view.')"
                    />
                </div>

                <div class="auth-header-stack__copy" x-show="mode === 'register'" x-transition.opacity.duration.250ms x-cloak>
                    <x-auth-header
                        :title="__('Create an account')"
                        :description="__('Set up your workspace and start tracking companies, contacts and follow-ups with a cleaner workflow.')"
                    />
                </div>

                <div class="auth-toggle crm-surface-muted">
                    <div class="auth-toggle__track" :class="mode === 'register' ? 'auth-toggle__track--register' : ''"></div>
                    <button type="button" class="auth-toggle__option" :class="mode === 'login' ? 'auth-toggle__option--active' : ''" @click="setMode('login')">
                        Log in
                    </button>
                    <button type="button" class="auth-toggle__option" :class="mode === 'register' ? 'auth-toggle__option--active' : ''" @click="setMode('register')">
                        Register
                    </button>
                </div>
            </div>

            <div class="auth-form-stage">
                <div class="auth-form-stage__rail" :class="mode === 'register' ? 'auth-form-stage__rail--register' : ''">
                    <section class="auth-form-stage__pane">
                        <div class="auth-form-note">
                            <span class="auth-form-note__label">Inside FollowUp</span>
                            <p class="auth-form-note__copy">Today’s priorities, overdue follow-ups and deal context are ready as soon as you sign in.</p>
                        </div>

                        <x-auth-session-status class="text-left" :status="session('status')" />

                        <form method="POST" action="{{ route('login.store') }}" class="auth-form-grid">
                            @csrf

                            <div class="auth-form-fieldset">
                                <p class="auth-form-fieldset__eyebrow">Credentials</p>
                                <div class="grid gap-5">
                                    <flux:input
                                        id="login_email"
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
                                            id="login_password"
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
                                <span class="auth-form-row__meta">Resume faster on this device.</span>
                            </div>

                            <div class="grid gap-3">
                                <button type="submit" class="crm-btn-primary auth-submit-button" data-test="login-button">
                                    {{ __('Log in') }}
                                </button>

                                <button type="button" class="crm-btn-secondary auth-alt-action auth-alt-action--button" @click="setMode('register')">
                                    <span>{{ __('Need an account?') }}</span>
                                    <strong>{{ __('Switch to register') }}</strong>
                                </button>
                            </div>
                        </form>
                    </section>

                    <section class="auth-form-stage__pane">
                        <div class="auth-form-note auth-form-note--soft">
                            <span class="auth-form-note__label">What you get</span>
                            <p class="auth-form-note__copy">A lightweight commercial workspace with visible next steps, interaction history and fewer dropped opportunities.</p>
                        </div>

                        <x-auth-session-status class="text-left" :status="session('status')" />

                        <form method="POST" action="{{ route('register.store') }}" class="auth-form-grid">
                            @csrf

                            <div class="auth-form-fieldset">
                                <p class="auth-form-fieldset__eyebrow">Profile</p>
                                <div class="grid gap-5">
                                    <flux:input
                                        id="register_name"
                                        name="name"
                                        :label="__('Name')"
                                        :value="old('name')"
                                        type="text"
                                        required
                                        autocomplete="name"
                                        :autofocus="$isRegister"
                                        :placeholder="__('Full name')"
                                    />

                                    <flux:input
                                        id="register_email"
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
                                        id="register_password"
                                        name="password"
                                        :label="__('Password')"
                                        type="password"
                                        required
                                        autocomplete="new-password"
                                        :placeholder="__('Password')"
                                        viewable
                                    />

                                    <flux:input
                                        id="register_password_confirmation"
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
                                <button type="submit" class="crm-btn-primary auth-submit-button" data-test="register-user-button">
                                    {{ __('Create account') }}
                                </button>

                                <button type="button" class="crm-btn-secondary auth-alt-action auth-alt-action--button" @click="setMode('login')">
                                    <span>{{ __('Already have an account?') }}</span>
                                    <strong>{{ __('Switch to login') }}</strong>
                                </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>

        <div class="auth-side-facts">
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">Daily focus</span>
                <p class="auth-side-facts__copy">Open FollowUp and know what needs attention now.</p>
            </div>
            <div class="auth-side-facts__item">
                <span class="auth-side-facts__label">Context preserved</span>
                <p class="auth-side-facts__copy">Conversations, quotations and next actions remain connected.</p>
            </div>
        </div>
    </div>
</x-layouts::auth>
