<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="auth-experience antialiased">
        <div class="auth-experience__bg-grid"></div>
        <div class="auth-experience__orb auth-experience__orb--brand" data-parallax data-parallax-speed="20"></div>
        <div class="auth-experience__orb auth-experience__orb--sky" data-parallax data-parallax-speed="-12"></div>
        <div class="auth-experience__orb auth-experience__orb--warm" data-parallax data-parallax-speed="10"></div>
        <div class="auth-floaters" aria-hidden="true">
            <div class="auth-floater auth-floater--company" data-parallax data-parallax-speed="8">
                <span class="auth-floater__label">{{ __('landing.floaters.labels.company') }}</span>
                <strong class="auth-floater__title">Northstar Retail</strong>
                <p class="auth-floater__meta">{{ __('landing.floaters.items.item_1.meta') }}</p>
            </div>
            <div class="auth-floater auth-floater--quote" data-parallax data-parallax-speed="-6">
                <span class="auth-floater__label">{{ __('landing.floaters.labels.quotation') }}</span>
                <strong class="auth-floater__title">{{ __('landing.floaters.items.item_2.title') }}</strong>
                <p class="auth-floater__meta">{{ __('landing.floaters.items.item_2.meta') }}</p>
            </div>
            <div class="auth-floater auth-floater--followup" data-parallax data-parallax-speed="10">
                <span class="auth-floater__label">{{ __('landing.floaters.labels.follow_up') }}</span>
                <strong class="auth-floater__title">{{ __('landing.floaters.items.item_3.title') }}</strong>
                <p class="auth-floater__meta">{{ __('landing.floaters.items.item_7.meta') }}</p>
            </div>
            <div class="auth-floater auth-floater--crm" data-parallax data-parallax-speed="-9">
                <span class="auth-floater__label">{{ __('landing.floaters.labels.crm') }}</span>
                <strong class="auth-floater__title">Vertex Partners</strong>
                <p class="auth-floater__meta">{{ __('landing.floaters.items.item_8.meta') }}</p>
            </div>
            <div class="auth-floater auth-floater--deal" data-parallax data-parallax-speed="7">
                <span class="auth-floater__label">{{ __('landing.floaters.labels.deal') }}</span>
                <strong class="auth-floater__title">{{ __('landing.floaters.items.item_6.title') }}</strong>
                <p class="auth-floater__meta">{{ __('auth.layout.floaters.deal.meta') }}</p>
            </div>
            <div class="auth-floater auth-floater--note" data-parallax data-parallax-speed="-11">
                <span class="auth-floater__label">{{ __('auth.layout.floaters.note.label') }}</span>
                <strong class="auth-floater__title">{{ __('landing.floaters.items.item_12.title') }}</strong>
                <p class="auth-floater__meta">{{ __('auth.layout.floaters.note.meta') }}</p>
            </div>
        </div>

        <div class="auth-shell">
            <section class="auth-showcase">
                <div class="auth-showcase__frame">
                    <div class="auth-showcase__ambient" aria-hidden="true">
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-a">
                            <span class="auth-floater__label">{{ __('landing.floaters.labels.company') }}</span>
                            <strong class="auth-floater__title">Orbit Studio</strong>
                            <p class="auth-floater__meta">{{ __('auth.layout.floaters.ambient.orbit_studio.meta') }}</p>
                        </div>
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-b">
                            <span class="auth-floater__label">{{ __('landing.floaters.labels.quotation') }}</span>
                            <strong class="auth-floater__title">{{ __('landing.floaters.items.item_9.title') }}</strong>
                            <p class="auth-floater__meta">{{ __('auth.layout.floaters.ambient.retainer.meta') }}</p>
                        </div>
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-c">
                            <span class="auth-floater__label">{{ __('landing.floaters.labels.follow_up') }}</span>
                            <strong class="auth-floater__title">{{ __('auth.layout.floaters.ambient.follow_up.title') }}</strong>
                            <p class="auth-floater__meta">{{ __('landing.floaters.items.item_3.meta') }}</p>
                        </div>
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-d">
                            <span class="auth-floater__label">{{ __('landing.floaters.labels.interaction') }}</span>
                            <strong class="auth-floater__title">{{ __('landing.floaters.items.item_4.title') }}</strong>
                            <p class="auth-floater__meta">{{ __('auth.layout.floaters.ambient.interaction.meta') }}</p>
                        </div>
                    </div>

                    <div class="auth-showcase__nav">
                        <x-app-logo href="{{ route('home') }}" variant="brand" img-class="h-18 w-auto max-w-none" class="auth-showcase__logo" />

                        <div class="hidden items-center gap-3 sm:flex">
                            <div class="flex items-center gap-1.5 sm:gap-2">
                                @foreach (config('app.supported_locales', ['es', 'en', 'pt']) as $locale)
                                    <form action="{{ route('locale.switch', $locale) }}" method="POST">
                                        @csrf

                                        <button
                                            type="submit"
                                            style="width:2.75rem;height:2.75rem;font-size:1.125rem;cursor:pointer"
                                            class="@class([
                                                'inline-flex items-center justify-center rounded-full border leading-none transition',
                                                'border-white/50 bg-white/20 text-white' => app()->getLocale() === $locale,
                                                'border-white/15 bg-white/8 text-white/75 hover:border-white/35 hover:bg-white/14 hover:text-white' => app()->getLocale() !== $locale,
                                            ])"
                                            aria-label="{{ __('landing.nav.languages.labels.'.$locale) }}"
                                            title="{{ __('landing.nav.languages.labels.'.$locale) }}"
                                        >
                                            <span aria-hidden="true" style="font-size:1.5rem;line-height:1;display:inline-block;transform:scale(1.15)">{{ __('landing.nav.languages.flags.'.$locale) }}</span>
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                            <a href="{{ route('home') }}" class="auth-showcase__nav-link">{{ __('auth.layout.nav.home') }}</a>
                            <a href="https://github.com/EzeArcich/followUp" target="_blank" rel="noreferrer" class="landing-social-button" aria-label="{{ __('landing.cta.social.github') }}" title="{{ __('landing.cta.social.github') }}">
                                <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                                    <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.426 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.866-.013-1.699-2.782.605-3.369-1.344-3.369-1.344-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.004.071 1.532 1.034 1.532 1.034.892 1.53 2.341 1.088 2.91.832.091-.647.35-1.088.636-1.338-2.221-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.987 1.029-2.687-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.56 9.56 0 0 1 12 6.844a9.56 9.56 0 0 1 2.504.337c1.909-1.296 2.748-1.026 2.748-1.026.546 1.378.203 2.397.1 2.65.64.7 1.028 1.594 1.028 2.687 0 3.848-2.338 4.695-4.566 4.943.359.31.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.481A10.019 10.019 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/silvio-arcich-5629841ba/" target="_blank" rel="noreferrer" class="landing-social-button" aria-label="{{ __('landing.cta.social.linkedin') }}">
                                <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                                    <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M8.34 17V9.5H5.84V17H8.34M7.09 8.44A1.46 1.46 0 1 0 7.09 5.53A1.46 1.46 0 0 0 7.09 8.44M18.16 17V12.86C18.16 10.64 16.97 9.61 15.38 9.61C14.1 9.61 13.53 10.32 13.21 10.82V9.5H10.71C10.74 10.37 10.71 17 10.71 17H13.21V12.81C13.21 12.59 13.23 12.37 13.29 12.21C13.46 11.76 13.84 11.29 14.5 11.29C15.37 11.29 15.72 11.95 15.72 12.92V17H18.16Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="auth-showcase__content">
                        <div class="space-y-5">
                            <div class="auth-showcase__brand">
                                <!-- <span class="auth-showcase__badge">{{ __('landing.hero.badge') }}</span> -->
                                <!-- <p class="auth-showcase__tagline">{{ __('auth.layout.showcase.tagline') }}</p> -->
                            </div>

                            <div class="space-y-2">
                                <h1 class="auth-showcase__title">
                                    {{ request()->routeIs('register') ? __('auth.layout.showcase.register.title') : __('auth.layout.showcase.login.title') }}
                                </h1>
                                <p class="auth-showcase__copy">
                                    {{ request()->routeIs('register') ? __('auth.layout.showcase.register.copy') : __('auth.layout.showcase.login.copy') }}
                                </p>
                            </div>

                            <div class="auth-showcase__points">
                                <div class="auth-showcase__point">
                                    <span class="auth-showcase__point-dot"></span>
                                    <span>{{ __('auth.layout.showcase.points.connected') }}</span>
                                </div>
                                <div class="auth-showcase__point">
                                    <span class="auth-showcase__point-dot"></span>
                                    <span>{{ __('auth.layout.showcase.points.due_dates') }}</span>
                                </div>
                                <div class="auth-showcase__point">
                                    <span class="auth-showcase__point-dot"></span>
                                    <span>{{ __('auth.layout.showcase.points.workflow') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="auth-showcase__board">
                            <div class="auth-showcase__board-card auth-showcase__board-card--primary">
                                <div class="auth-showcase__board-row">
                                        <div>
                                            <p class="auth-showcase__eyebrow">{{ __('auth.layout.board.today') }}</p>
                                            <p class="auth-showcase__headline">{{ __('auth.layout.board.follow_ups_due_now') }}</p>
                                        </div>
                                        <span class="auth-showcase__pill">06</span>
                                    </div>

                                <div class="auth-showcase__task-list">
                                    <div class="auth-showcase__task">
                                        <div>
                                            <p class="auth-showcase__task-title">Acme Logistics</p>
                                            <p class="auth-showcase__task-copy">{{ __('auth.layout.board.tasks.acme_logistics.copy') }}</p>
                                        </div>
                                        <span class="auth-showcase__task-badge">{{ __('landing.board.tasks.acme_logistics.chip') }}</span>
                                    </div>
                                    <div class="auth-showcase__task">
                                        <div>
                                            <p class="auth-showcase__task-title">Northstar Retail</p>
                                            <p class="auth-showcase__task-copy">{{ __('auth.layout.board.tasks.northstar_retail.copy') }}</p>
                                        </div>
                                        <span class="auth-showcase__task-badge auth-showcase__task-badge--violet">{{ __('landing.board.pipeline.stages.negotiation') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="auth-showcase__board-grid">
                                <div class="auth-showcase__board-card auth-showcase__board-card--metric">
                                    <p class="auth-showcase__eyebrow">{{ __('landing.floaters.labels.pipeline') }}</p>
                                    <p class="auth-showcase__metric">128</p>
                                    <p class="auth-showcase__metric-copy">{{ __('auth.layout.board.pipeline_metric') }}</p>
                                </div>
                                <div class="auth-showcase__board-card auth-showcase__board-card--metric auth-showcase__board-card--accent">
                                    <p class="auth-showcase__eyebrow">{{ __('auth.layout.board.execution') }}</p>
                                    <p class="auth-showcase__metric">92%</p>
                                    <p class="auth-showcase__metric-copy">{{ __('auth.layout.board.execution_metric') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="auth-panel">
                <div class="auth-panel__inner">
                    <div class="auth-panel__card">
                        <div class="flex flex-col gap-6">
                            {{ $slot }}
                        </div>
                    </div>

                </div>
            </section>
        </div>

        @fluxScripts
    </body>
</html>
