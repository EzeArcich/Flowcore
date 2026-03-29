<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php($title = __('landing.hero.title'))
        @include('partials.head')
    </head>
    <body class="bg-white text-ink-950 antialiased">
        <div class="landing-page">
            <div class="landing-orb landing-orb--brand" data-parallax data-parallax-speed="24"></div>
            <div class="landing-orb landing-orb--sky" data-parallax data-parallax-speed="-18"></div>
            <div class="landing-orb landing-orb--warm" data-parallax data-parallax-speed="14"></div>
            <div class="landing-grid"></div>
            <div class="landing-floaters" aria-hidden="true">
                <div class="landing-floater landing-floater--1" data-parallax data-parallax-speed="8">
                    <span class="landing-floater__label">{{ __('landing.floaters.items.item_1.label') }}</span>
                    <strong class="landing-floater__title">Northstar Retail</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_1.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--2" data-parallax data-parallax-speed="-7">
                    <span class="landing-floater__label">{{ __('landing.floaters.items.item_2.label') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_2.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_2.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--3" data-parallax data-parallax-speed="11">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.follow_up') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_3.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_3.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--4" data-parallax data-parallax-speed="-9">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.interaction') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_4.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_4.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--5" data-parallax data-parallax-speed="6">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.company') }}</span>
                    <strong class="landing-floater__title">Orbit Studio</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_5.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--6" data-parallax data-parallax-speed="-10">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.deal') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_6.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_6.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--7" data-parallax data-parallax-speed="9">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.follow_up') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_7.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_7.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--8" data-parallax data-parallax-speed="-8">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.crm') }}</span>
                    <strong class="landing-floater__title">Vertex Partners</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_8.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--9" data-parallax data-parallax-speed="7">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.quotation') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_9.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_9.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--10" data-parallax data-parallax-speed="-6">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.contact') }}</span>
                    <strong class="landing-floater__title">Ana Torres</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_10.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--11" data-parallax data-parallax-speed="10">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.pipeline') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_11.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_11.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--12" data-parallax data-parallax-speed="-11">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.task') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_12.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_12.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--13" data-parallax data-parallax-speed="5">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.company') }}</span>
                    <strong class="landing-floater__title">Acme Logistics</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_13.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--14" data-parallax data-parallax-speed="-7">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.interaction') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_14.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_14.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--15" data-parallax data-parallax-speed="12">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.reminder') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_15.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_15.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--16" data-parallax data-parallax-speed="-8">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.contact') }}</span>
                    <strong class="landing-floater__title">Lucia Gomez</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_16.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--17" data-parallax data-parallax-speed="7">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.company') }}</span>
                    <strong class="landing-floater__title">Atlas Commerce</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_17.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--18" data-parallax data-parallax-speed="-10">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.quotation') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_18.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_18.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--19" data-parallax data-parallax-speed="9">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.follow_up') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_19.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_19.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--20" data-parallax data-parallax-speed="-7">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.interaction') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_20.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_20.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--21" data-parallax data-parallax-speed="6">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.deal') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_21.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_21.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--22" data-parallax data-parallax-speed="-12">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.crm') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_22.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_22.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--23" data-parallax data-parallax-speed="8">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.task') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_23.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_23.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--24" data-parallax data-parallax-speed="-9">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.pipeline') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_24.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_24.meta') }}</p>
                </div>
                <div class="landing-floater landing-floater--25" data-parallax data-parallax-speed="11">
                    <span class="landing-floater__label">{{ __('landing.floaters.labels.reminder') }}</span>
                    <strong class="landing-floater__title">{{ __('landing.floaters.items.item_25.title') }}</strong>
                    <p class="landing-floater__meta">{{ __('landing.floaters.items.item_25.meta') }}</p>
                </div>
            </div>

            <header class="relative z-10 w-full px-5 pt-5 sm:px-6 lg:px-10">
                <nav class="landing-nav">
                    <x-app-logo variant="brand" href="{{ route('home') }}" class="landing-logo -ml-1 md:-ml-3 lg:-ml-6" />

                    <div class="hidden items-center gap-8 text-sm font-medium text-white/70 lg:flex">
                        <a href="#solution" class="transition hover:text-white">{{ __('landing.nav.solution') }}</a>
                        <a href="#features" class="transition hover:text-white">{{ __('landing.nav.features') }}</a>
                        <a href="#workflow" class="transition hover:text-white">{{ __('landing.nav.workflow') }}</a>
                        <a href="#tech" class="transition hover:text-white">{{ __('landing.nav.stack') }}</a>
                    </div>

                    <div class="flex items-center gap-3">
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

                        <a href="{{ route('login') }}" class="landing-link landing-link--cta">
                            {{ __('landing.nav.cta_demo') }}
                        </a>
                        <!-- <a href="{{ route('register') }}" class="landing-link hidden sm:inline-flex">
                            Try the demo
                        </a> -->
                    </div>
                </nav>
            </header>

            <main class="landing-shell relative z-10 pb-24 pt-10 lg:pb-32 lg:pt-14">
                <section class="landing-hero-grid">
                    <div class="space-y-8">
                        <div class="landing-reveal landing-hero-copy-shell is-visible space-y-6 lg:pt-10">
                            <p class="landing-brand-mark">Flowcore</p>

                            <!-- <span class="landing-badge">
                                {{ __('landing.hero.badge') }}
                            </span> -->

                            <p class="landing-brand-tagline">
                                {{ __('landing.hero.tagline') }}
                            </p>

                            <div class="space-y-4">
                                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:gap-6">
                                    <h1 class="landing-hero-title lg:max-w-[17ch]">
                                        {{ __('landing.hero.title') }}
                                    </h1>
                                </div>
                                <p class="landing-hero-copy">
                                    {{ __('landing.hero.subtitle') }}
                                </p>
                            </div>

                            <div class="landing-trust-strip">
                                <div class="landing-trust-item">
                                    <span class="landing-trust-item__dot"></span>
                                    <strong>{{ __('landing.hero.trust.from_anywhere') }}</strong>
                                </div>
                                <div class="landing-trust-item">
                                    <span class="landing-trust-item__dot"></span>
                                    <strong>{{ __('landing.hero.trust.without_instalations') }}</strong>
                                </div>
                                <div class="landing-trust-item">
                                    <span class="landing-trust-item__dot"></span>
                                    <strong>{{ __('landing.hero.trust.built_for_real_workflows') }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="landing-reveal" data-reveal>
                        <div class="landing-hero-board">
                            <div class="landing-hero-board__glow"></div>

                            <div class="landing-hero-board__topbar">
                                <div>
                                    <p class="landing-card-kicker">{{ __('landing.board.kicker') }}</p>
                                    <h2 class="landing-card-title">{{ __('landing.board.title') }}</h2>
                                </div>
                                <span class="landing-live-pill">
                                    <span class="landing-live-pill__dot"></span>
                                    {{ __('landing.board.active') }}
                                </span>
                            </div>

                            <div class="grid gap-4 xl:grid-cols-[1.15fr_0.85fr]">
                                <div class="space-y-4">
                                    <div class="landing-panel landing-panel--hero-cut">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <p class="landing-panel__eyebrow">{{ __('landing.board.follow_ups.eyebrow') }}</p>
                                                <p class="landing-panel__headline">{{ __('landing.board.follow_ups.headline') }}</p>
                                            </div>
                                            <span class="landing-chip landing-chip--danger">{{ __('landing.board.follow_ups.due_now') }}</span>
                                        </div>

                                        <div class="mt-5 space-y-3">
                                            <div class="landing-task-card">
                                                <div>
                                                    <p class="landing-task-card__title">Acme Logistics</p>
                                                    <p class="landing-task-card__meta">{{ __('landing.board.tasks.acme_logistics.meta') }}</p>
                                                </div>
                                                <span class="landing-chip">{{ __('landing.board.tasks.acme_logistics.chip') }}</span>
                                            </div>
                                            <div class="landing-task-card">
                                                <div>
                                                    <p class="landing-task-card__title">Northstar Retail</p>
                                                    <p class="landing-task-card__meta">{{ __('landing.board.tasks.northstar_retail.meta') }}</p>
                                                </div>
                                                <span class="landing-chip landing-chip--brand">{{ __('landing.board.tasks.northstar_retail.chip') }}</span>
                                            </div>
                                            <div class="landing-task-card">
                                                <div>
                                                    <p class="landing-task-card__title">Vertex Partners</p>
                                                    <p class="landing-task-card__meta">{{ __('landing.board.tasks.vertex_partners.meta') }}</p>
                                                </div>
                                                <span class="landing-chip landing-chip--success">{{ __('landing.board.tasks.vertex_partners.chip') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="landing-metric-ribbon">
                                        <div class="landing-kpi-card">
                                            <span class="landing-kpi-card__label">{{ __('landing.board.metrics.prospects_in_motion') }}</span>
                                            <strong class="landing-kpi-card__value">128</strong>
                                        </div>
                                        <div class="landing-kpi-card">
                                            <span class="landing-kpi-card__label">{{ __('landing.board.metrics.follow_ups_today') }}</span>
                                            <strong class="landing-kpi-card__value">24</strong>
                                        </div>
                                        <div class="landing-kpi-card">
                                            <span class="landing-kpi-card__label">{{ __('landing.board.metrics.on_time_execution') }}</span>
                                            <strong class="landing-kpi-card__value">92%</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="landing-panel landing-panel--stack landing-panel--tall">
                                        <p class="landing-panel__eyebrow">{{ __('landing.board.pipeline.eyebrow') }}</p>
                                        <p class="landing-panel__subcopy">{{ __('landing.board.pipeline.subcopy') }}</p>
                                        <div class="mt-5 space-y-4">
                                            <div class="landing-stage">
                                                <div class="landing-stage__label">
                                                    <span>{{ __('landing.board.pipeline.stages.discovery') }}</span>
                                                    <span>34</span>
                                                </div>
                                                <div class="landing-stage__bar">
                                                    <span style="width: 82%"></span>
                                                </div>
                                            </div>
                                            <div class="landing-stage">
                                                <div class="landing-stage__label">
                                                    <span>{{ __('landing.board.pipeline.stages.proposal') }}</span>
                                                    <span>18</span>
                                                </div>
                                                <div class="landing-stage__bar">
                                                    <span style="width: 58%"></span>
                                                </div>
                                            </div>
                                            <div class="landing-stage">
                                                <div class="landing-stage__label">
                                                    <span>{{ __('landing.board.pipeline.stages.negotiation') }}</span>
                                                    <span>9</span>
                                                </div>
                                                <div class="landing-stage__bar">
                                                    <span style="width: 39%"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="landing-note-band mt-5">
                                        <p>{{ __('landing.board.note') }}</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="landing-reveal mt-24" data-reveal>
                    <div class="landing-section-header landing-section-header--glass">
                        <p class="landing-section-kicker">{{ __('landing.problem.kicker') }}</p>
                        <h2 class="landing-section-title">{{ __('landing.problem.title') }}</h2>
                        <p class="landing-section-copy">
                            {{ __('landing.problem.description') }}
                        </p>
                    </div>

                    <div class="landing-problem-grid">
                        <article class="landing-problem-card landing-problem-card--wide">
                            <p class="landing-value-card__eyebrow">{{ __('landing.problem.cards.scattered_information.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.problem.cards.scattered_information.title') }}</h3>
                        </article>
                        <article class="landing-problem-card">
                            <p class="landing-value-card__eyebrow">{{ __('landing.problem.cards.missed_follow_ups.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.problem.cards.missed_follow_ups.title') }}</h3>
                        </article>
                        <article class="landing-problem-card">
                            <p class="landing-value-card__eyebrow">{{ __('landing.problem.cards.lost_context.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.problem.cards.lost_context.title') }}</h3>
                        </article>
                        <article class="landing-problem-card landing-problem-card--accent">
                            <p class="landing-value-card__eyebrow">{{ __('landing.problem.cards.slow_deal_movement.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.problem.cards.slow_deal_movement.title') }}</h3>
                        </article>
                    </div>
                </section>

                <section id="solution" class="landing-reveal mt-24 grid gap-8 xl:grid-cols-[0.78fr_1.22fr]" data-reveal>
                    <div class="landing-section-header landing-section-header--sticky">
                        <p class="landing-section-kicker">{{ __('landing.solution.kicker') }}</p>
                        <h2 class="landing-section-title">{{ __('landing.solution.title') }}</h2>
                        <p class="landing-section-copy">
                            {{ __('landing.solution.description') }}
                        </p>
                    </div>

                    <div class="landing-solution-flow">
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">01</span>
                            <div>
                                <h3 class="landing-feature-item__title">{{ __('landing.solution.items.companies.title') }}</h3>
                                <p class="landing-feature-item__copy">{{ __('landing.solution.items.companies.copy') }}</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">02</span>
                            <div>
                                <h3 class="landing-feature-item__title">{{ __('landing.solution.items.contacts.title') }}</h3>
                                <p class="landing-feature-item__copy">{{ __('landing.solution.items.contacts.copy') }}</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">03</span>
                            <div>
                                <h3 class="landing-feature-item__title">{{ __('landing.solution.items.interactions.title') }}</h3>
                                <p class="landing-feature-item__copy">{{ __('landing.solution.items.interactions.copy') }}</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">04</span>
                            <div>
                                <h3 class="landing-feature-item__title">{{ __('landing.solution.items.follow_ups.title') }}</h3>
                                <p class="landing-feature-item__copy">{{ __('landing.solution.items.follow_ups.copy') }}</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">05</span>
                            <div>
                                <h3 class="landing-feature-item__title">{{ __('landing.solution.items.quotations.title') }}</h3>
                                <p class="landing-feature-item__copy">{{ __('landing.solution.items.quotations.copy') }}</p>
                            </div>
                        </article>
                    </div>
                </section>

                <section id="features" class="landing-reveal mt-24" data-reveal>
                    <div class="landing-section-header">
                        <h2 class="landing-section-title">{{ __('landing.features.title') }}</h2>
                        <p class="landing-section-copy">
                            {{ __('landing.features.description') }}
                        </p>
                    </div>

                    <div class="landing-feature-grid">
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">{{ __('landing.features.items.follow_ups_with_due_dates.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.features.items.follow_ups_with_due_dates.title') }}</h3>
                        </article>
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">{{ __('landing.features.items.interaction_timeline.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.features.items.interaction_timeline.title') }}</h3>
                        </article>
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">{{ __('landing.features.items.daily_focus_dashboard.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.features.items.daily_focus_dashboard.title') }}</h3>
                        </article>
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">{{ __('landing.features.items.deal_tracking.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.features.items.deal_tracking.title') }}</h3>
                        </article>
                        <article class="landing-feature-slab landing-feature-slab--wide">
                            <p class="landing-value-card__eyebrow">{{ __('landing.features.items.fast_and_simple_ui.eyebrow') }}</p>
                            <h3 class="landing-value-card__title">{{ __('landing.features.items.fast_and_simple_ui.title') }}</h3>
                        </article>
                    </div>
                </section>

                <section id="workflow" class="landing-reveal mt-24 grid gap-8 xl:grid-cols-[0.88fr_1.12fr]" data-reveal>
                    <div class="landing-section-header">
                        <p class="landing-section-kicker">{{ __('landing.workflow.kicker') }}</p>
                        <h2 class="landing-section-title">{{ __('landing.workflow.title') }}</h2>
                        <p class="landing-section-copy">
                            {{ __('landing.workflow.description') }}
                        </p>
                    </div>

                    <div class="landing-workflow-path">
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">A</span>
                            <div>
                                <h3 class="landing-workflow-step__title">{{ __('landing.workflow.steps.add_company.title') }}</h3>
                                <p class="landing-workflow-step__copy">{{ __('landing.workflow.steps.add_company.copy') }}</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">B</span>
                            <div>
                                <h3 class="landing-workflow-step__title">{{ __('landing.workflow.steps.add_contacts.title') }}</h3>
                                <p class="landing-workflow-step__copy">{{ __('landing.workflow.steps.add_contacts.copy') }}</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">C</span>
                            <div>
                                <h3 class="landing-workflow-step__title">{{ __('landing.workflow.steps.log_interaction.title') }}</h3>
                                <p class="landing-workflow-step__copy">{{ __('landing.workflow.steps.log_interaction.copy') }}</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">D</span>
                            <div>
                                <h3 class="landing-workflow-step__title">{{ __('landing.workflow.steps.schedule_follow_up.title') }}</h3>
                                <p class="landing-workflow-step__copy">{{ __('landing.workflow.steps.schedule_follow_up.copy') }}</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">E</span>
                            <div>
                                <h3 class="landing-workflow-step__title">{{ __('landing.workflow.steps.move_the_deal_forward.title') }}</h3>
                                <p class="landing-workflow-step__copy">{{ __('landing.workflow.steps.move_the_deal_forward.copy') }}</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="demo" class="landing-reveal mt-24" data-reveal>
                    <div class="landing-section-header">
                        <h2 class="landing-section-title">{{ __('landing.demo.title') }}</h2>
                        <p class="landing-section-copy">
                            {{ __('landing.demo.description') }}
                        </p>
                    </div>

                    <div class="landing-demo-grid">
                        <article class="landing-demo-panel">
                            <p class="landing-value-card__eyebrow">{{ __('landing.demo.panels.company_context.eyebrow') }}</p>
                            <h3 class="landing-demo-panel__title">{{ __('landing.demo.panels.company_context.title') }}</h3>
                            <p class="landing-demo-panel__copy">{{ __('landing.demo.panels.company_context.copy') }}</p>
                        </article>
                        <article class="landing-demo-panel landing-demo-panel--offset">
                            <p class="landing-value-card__eyebrow">{{ __('landing.board.follow_ups.eyebrow') }}</p>
                            <h3 class="landing-demo-panel__title">{{ __('landing.demo.panels.todays_follow_ups.title') }}</h3>
                            <p class="landing-demo-panel__copy">{{ __('landing.demo.panels.todays_follow_ups.copy') }}</p>
                        </article>
                        <article class="landing-demo-panel">
                            <p class="landing-value-card__eyebrow">{{ __('landing.demo.panels.interaction_history.eyebrow') }}</p>
                            <h3 class="landing-demo-panel__title">{{ __('landing.demo.panels.interaction_history.title') }}</h3>
                            <p class="landing-demo-panel__copy">{{ __('landing.demo.panels.interaction_history.copy') }}</p>
                        </article>
                    </div>
                </section>

                <section class="landing-reveal mt-24" data-reveal>
                    <div class="landing-cta-banner">
                        <div>
                            <h2 class="landing-section-title max-w-3xl">{{ __('landing.cta.title') }}</h2>
                            <p class="mt-4 max-w-3xl text-base leading-8 text-black-700">
                                {{ __('landing.cta.description') }}
                            </p>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="https://github.com/EzeArcich" target="_blank" rel="noreferrer" class="landing-social-button" aria-label="{{ __('landing.cta.social.github') }}">
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
                </section>
            </main>
        </div>
    </body>
</html>
