<div
    x-data="{
        mode: @js($initialMode),
        copy: {
            register: {
                kicker: @js(__('auth.modal.register.kicker')),
                title: @js(__('auth.modal.register.title')),
                description: @js(__('auth.modal.register.description')),
            },
            login: {
                kicker: @js(__('auth.modal.login.kicker')),
                title: @js(__('auth.modal.login.title')),
                description: @js(__('auth.modal.login.description')),
            },
        },
        syncUrl() {
            history.replaceState({}, '', this.mode === 'register' ? @js(route('register')) : @js(route('login')));
        },
        showLogin() {
            this.mode = 'login';
            this.syncUrl();
        },
        showRegister() {
            this.mode = 'register';
            this.syncUrl();
        },
    }"
    x-init="syncUrl()"
    class="flex flex-col gap-6"
>
    <div class="auth-form-shell">
        <!-- <div class="auth-modal-brand">
            <x-app-logo href="{{ route('home') }}" variant="light" class="auth-modal-brand__logo" />
            <p class="auth-modal-brand__tagline">{{ __('auth.layout.showcase.tagline') }}</p>
        </div> -->

        <div class="auth-modal-header">
            <!-- <div class="auth-modal-copy">
                <p class="auth-modal-kicker" x-text="copy[mode].kicker"></p>
                <h2 class="auth-modal-title" x-text="copy[mode].title"></h2>
                <p class="auth-modal-description" x-text="copy[mode].description"></p>
            </div> -->

            <div class="auth-toggle">
                <div class="auth-toggle__track" :class="mode === 'register' ? 'auth-toggle__track--register' : ''"></div>
                <button type="button" class="auth-toggle__option" :class="mode === 'login' ? 'auth-toggle__option--active' : ''" @click="showLogin()">
                    {{ __('auth.modal.toggle.login') }}
                </button>
                <button type="button" class="auth-toggle__option" :class="mode === 'register' ? 'auth-toggle__option--active' : ''" @click="showRegister()">
                    {{ __('auth.modal.toggle.register') }}
                </button>
            </div>
        </div>

        <div class="auth-form-stage">
            <div class="auth-form-stage__pane auth-form-stage__pane--active" x-show="mode === 'login'" x-transition:enter="auth-modal-transition" x-transition:enter-start="auth-modal-transition-start" x-transition:enter-end="auth-modal-transition-end" x-transition:leave="auth-modal-transition" x-transition:leave-start="auth-modal-transition-end" x-transition:leave-end="auth-modal-transition-start">

                <x-auth-session-status class="text-left" :status="session('status')" />

                <form method="POST" action="{{ route('login.store') }}" class="auth-form-grid">
                    @csrf

                    <div class="auth-form-fieldset">
                        <p class="auth-form-fieldset__eyebrow">{{ __('auth.modal.login.fieldsets.credentials') }}</p>
                        <div class="grid gap-5">
                            <flux:input
                                id="portal_login_email"
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
                                    id="portal_login_password"
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
                        <button type="submit" class="auth-modal-button auth-modal-button--primary auth-submit-button" data-test="login-button">
                            {{ __('auth.modal.toggle.login') }}
                        </button>

                        <button type="button" class="auth-modal-button auth-modal-button--ghost auth-alt-action auth-alt-action--button" @click="showRegister()">
                            <span>{{ __('auth.modal.login.alt_action.prompt') }}</span>
                            <strong>{{ __('auth.modal.login.alt_action.cta') }}</strong>
                        </button>
                    </div>
                </form>
            </div>

            <div class="auth-form-stage__pane auth-form-stage__pane--active" x-show="mode === 'register'" x-transition:enter="auth-modal-transition" x-transition:enter-start="auth-modal-transition-start" x-transition:enter-end="auth-modal-transition-end" x-transition:leave="auth-modal-transition" x-transition:leave-start="auth-modal-transition-end" x-transition:leave-end="auth-modal-transition-start" x-cloak>

                <x-auth-session-status class="text-left" :status="session('status')" />

                <form method="POST" action="{{ route('register.store') }}" class="auth-form-grid">
                    @csrf

                    <div class="auth-form-fieldset">
                        <p class="auth-form-fieldset__eyebrow">{{ __('auth.modal.register.fieldsets.profile') }}</p>
                        <div class="grid gap-5">
                            <flux:input
                                id="portal_register_name"
                                name="name"
                                :label="__('Name')"
                                :value="old('name')"
                                type="text"
                                required
                                autocomplete="name"
                                :autofocus="$initialMode === 'register'"
                                :placeholder="__('Full name')"
                            />

                            <flux:input
                                id="portal_register_email"
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
                                id="portal_register_password"
                                name="password"
                                :label="__('Password')"
                                type="password"
                                required
                                autocomplete="new-password"
                                :placeholder="__('Password')"
                                viewable
                            />

                            <flux:input
                                id="portal_register_password_confirmation"
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
                        <button type="submit" class="auth-modal-button auth-modal-button--primary auth-submit-button" data-test="register-user-button">
                            {{ __('auth.modal.register.submit') }}
                        </button>

                        <button type="button" class="auth-modal-button auth-modal-button--ghost auth-alt-action auth-alt-action--button" @click="showLogin()">
                            <span>{{ __('auth.modal.register.alt_action.prompt') }}</span>
                            <strong>{{ __('auth.modal.register.alt_action.cta') }}</strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
