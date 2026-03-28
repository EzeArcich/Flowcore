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
                <span class="auth-floater__label">Company</span>
                <strong class="auth-floater__title">Northstar Retail</strong>
                <p class="auth-floater__meta">stage: proposal_sent</p>
            </div>
            <div class="auth-floater auth-floater--quote" data-parallax data-parallax-speed="-6">
                <span class="auth-floater__label">Quotation</span>
                <strong class="auth-floater__title">$6,400 proposal</strong>
                <p class="auth-floater__meta">valid until: Apr 14</p>
            </div>
            <div class="auth-floater auth-floater--followup" data-parallax data-parallax-speed="10">
                <span class="auth-floater__label">Follow-up</span>
                <strong class="auth-floater__title">Reply due today</strong>
                <p class="auth-floater__meta">owner: sales</p>
            </div>
            <div class="auth-floater auth-floater--crm" data-parallax data-parallax-speed="-9">
                <span class="auth-floater__label">CRM</span>
                <strong class="auth-floater__title">Vertex Partners</strong>
                <p class="auth-floater__meta">context: meeting booked</p>
            </div>
            <div class="auth-floater auth-floater--deal" data-parallax data-parallax-speed="7">
                <span class="auth-floater__label">Deal</span>
                <strong class="auth-floater__title">Negotiation open</strong>
                <p class="auth-floater__meta">status: waiting response</p>
            </div>
            <div class="auth-floater auth-floater--note" data-parallax data-parallax-speed="-11">
                <span class="auth-floater__label">Note</span>
                <strong class="auth-floater__title">Proposal revision</strong>
                <p class="auth-floater__meta">requested by stakeholder</p>
            </div>
        </div>

        <div class="auth-shell">
            <section class="auth-showcase">
                <div class="auth-showcase__frame">
                    <div class="auth-showcase__ambient" aria-hidden="true">
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-a">
                            <span class="auth-floater__label">Company</span>
                            <strong class="auth-floater__title">Orbit Studio</strong>
                            <p class="auth-floater__meta">industry: design systems</p>
                        </div>
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-b">
                            <span class="auth-floater__label">Quotation</span>
                            <strong class="auth-floater__title">$2,800 retainer</strong>
                            <p class="auth-floater__meta">stage: sent yesterday</p>
                        </div>
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-c">
                            <span class="auth-floater__label">Follow-up</span>
                            <strong class="auth-floater__title">Call due at 16:30</strong>
                            <p class="auth-floater__meta">priority: high</p>
                        </div>
                        <div class="auth-floater auth-floater--ambient auth-floater--ambient-d">
                            <span class="auth-floater__label">Interaction</span>
                            <strong class="auth-floater__title">Discovery recap</strong>
                            <p class="auth-floater__meta">last update: 2h ago</p>
                        </div>
                    </div>

                    <div class="auth-showcase__nav">
                        <x-app-logo href="{{ route('home') }}" class="auth-showcase__logo" />

                        <div class="hidden items-center gap-3 sm:flex">
                            <a href="{{ route('home') }}" class="auth-showcase__nav-link">Home</a>
                            <a href="https://github.com/EzeArcich/followUp" target="_blank" rel="noreferrer" class="auth-showcase__nav-link">
                                GitHub
                            </a>
                        </div>
                    </div>

                    <div class="auth-showcase__content">
                        <div class="space-y-5">
                            <div class="space-y-2">
                                <p class="landing-brand-mark">FollowUp</p>
                                <span class="auth-showcase__badge">Open source CRM for focused sales</span>
                            </div>

                            <div class="space-y-2">
                                <h1 class="auth-showcase__title">
                                    {{ request()->routeIs('register') ? 'Create an account and start running follow-ups with structure.' : 'Pick the thread back up and keep every opportunity moving.' }}
                                </h1>
                                <p class="auth-showcase__copy">
                                    {{ request()->routeIs('register') ? 'FollowUp keeps companies, contacts, conversations, quotations and next steps connected so you can operate without scattered notes or delayed follow-ups.' : 'FollowUp helps freelancers, developers and small teams keep commercial context visible, define the next step clearly and avoid losing deals to silence.' }}
                                </p>
                            </div>

                            <div class="auth-showcase__points">
                                <div class="auth-showcase__point">
                                    <span class="auth-showcase__point-dot"></span>
                                    <span>Companies, contacts and conversations stay connected.</span>
                                </div>
                                <div class="auth-showcase__point">
                                    <span class="auth-showcase__point-dot"></span>
                                    <span>Due dates turn intent into visible execution.</span>
                                </div>
                                <div class="auth-showcase__point">
                                    <span class="auth-showcase__point-dot"></span>
                                    <span>A lightweight workflow built for real sales follow-through.</span>
                                </div>
                            </div>
                        </div>

                        <div class="auth-showcase__board">
                            <div class="auth-showcase__board-card auth-showcase__board-card--primary">
                                <div class="auth-showcase__board-row">
                                    <div>
                                        <p class="auth-showcase__eyebrow">Today</p>
                                        <p class="auth-showcase__headline">Follow-ups due now</p>
                                    </div>
                                    <span class="auth-showcase__pill">06</span>
                                </div>

                                <div class="auth-showcase__task-list">
                                    <div class="auth-showcase__task">
                                        <div>
                                            <p class="auth-showcase__task-title">Acme Logistics</p>
                                            <p class="auth-showcase__task-copy">Proposal sent, reply expected this afternoon.</p>
                                        </div>
                                        <span class="auth-showcase__task-badge">High intent</span>
                                    </div>
                                    <div class="auth-showcase__task">
                                        <div>
                                            <p class="auth-showcase__task-title">Northstar Retail</p>
                                            <p class="auth-showcase__task-copy">Decision maker asked for a revised quotation.</p>
                                        </div>
                                        <span class="auth-showcase__task-badge auth-showcase__task-badge--violet">Negotiation</span>
                                    </div>
                                </div>
                            </div>

                            <div class="auth-showcase__board-grid">
                                <div class="auth-showcase__board-card auth-showcase__board-card--metric">
                                    <p class="auth-showcase__eyebrow">Pipeline</p>
                                    <p class="auth-showcase__metric">128</p>
                                    <p class="auth-showcase__metric-copy">active opportunities</p>
                                </div>
                                <div class="auth-showcase__board-card auth-showcase__board-card--metric auth-showcase__board-card--accent">
                                    <p class="auth-showcase__eyebrow">Execution</p>
                                    <p class="auth-showcase__metric">92%</p>
                                    <p class="auth-showcase__metric-copy">follow-ups on time</p>
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

                    <p class="auth-panel__footer">
                        <a href="{{ route('home') }}" class="auth-panel__footer-link">Back to product overview</a>
                    </p>
                </div>
            </section>
        </div>

        @fluxScripts
    </body>
</html>
