<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @php($title = 'Stop losing deals because follow-ups were left for later')
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
                    <span class="landing-floater__label">Company</span>
                    <strong class="landing-floater__title">Northstar Retail</strong>
                    <p class="landing-floater__meta">stage: proposal_sent</p>
                </div>
                <div class="landing-floater landing-floater--2" data-parallax data-parallax-speed="-7">
                    <span class="landing-floater__label">Quotation</span>
                    <strong class="landing-floater__title">$6,400 proposal</strong>
                    <p class="landing-floater__meta">valid until: Apr 14</p>
                </div>
                <div class="landing-floater landing-floater--3" data-parallax data-parallax-speed="11">
                    <span class="landing-floater__label">Follow-up</span>
                    <strong class="landing-floater__title">Reply due today</strong>
                    <p class="landing-floater__meta">priority: high</p>
                </div>
                <div class="landing-floater landing-floater--4" data-parallax data-parallax-speed="-9">
                    <span class="landing-floater__label">Interaction</span>
                    <strong class="landing-floater__title">Discovery recap</strong>
                    <p class="landing-floater__meta">2h ago</p>
                </div>
                <div class="landing-floater landing-floater--5" data-parallax data-parallax-speed="6">
                    <span class="landing-floater__label">Company</span>
                    <strong class="landing-floater__title">Orbit Studio</strong>
                    <p class="landing-floater__meta">industry: design</p>
                </div>
                <div class="landing-floater landing-floater--6" data-parallax data-parallax-speed="-10">
                    <span class="landing-floater__label">Deal</span>
                    <strong class="landing-floater__title">Negotiation open</strong>
                    <p class="landing-floater__meta">waiting response</p>
                </div>
                <div class="landing-floater landing-floater--7" data-parallax data-parallax-speed="9">
                    <span class="landing-floater__label">Follow-up</span>
                    <strong class="landing-floater__title">Call due 16:30</strong>
                    <p class="landing-floater__meta">owner: sales</p>
                </div>
                <div class="landing-floater landing-floater--8" data-parallax data-parallax-speed="-8">
                    <span class="landing-floater__label">CRM</span>
                    <strong class="landing-floater__title">Vertex Partners</strong>
                    <p class="landing-floater__meta">context: meeting booked</p>
                </div>
                <div class="landing-floater landing-floater--9" data-parallax data-parallax-speed="7">
                    <span class="landing-floater__label">Quotation</span>
                    <strong class="landing-floater__title">$2,800 retainer</strong>
                    <p class="landing-floater__meta">sent yesterday</p>
                </div>
                <div class="landing-floater landing-floater--10" data-parallax data-parallax-speed="-6">
                    <span class="landing-floater__label">Contact</span>
                    <strong class="landing-floater__title">Ana Torres</strong>
                    <p class="landing-floater__meta">role: founder</p>
                </div>
                <div class="landing-floater landing-floater--11" data-parallax data-parallax-speed="10">
                    <span class="landing-floater__label">Pipeline</span>
                    <strong class="landing-floater__title">Discovery 34</strong>
                    <p class="landing-floater__meta">proposal 18</p>
                </div>
                <div class="landing-floater landing-floater--12" data-parallax data-parallax-speed="-11">
                    <span class="landing-floater__label">Task</span>
                    <strong class="landing-floater__title">Proposal revision</strong>
                    <p class="landing-floater__meta">stakeholder request</p>
                </div>
                <div class="landing-floater landing-floater--13" data-parallax data-parallax-speed="5">
                    <span class="landing-floater__label">Company</span>
                    <strong class="landing-floater__title">Acme Logistics</strong>
                    <p class="landing-floater__meta">status: hot lead</p>
                </div>
                <div class="landing-floater landing-floater--14" data-parallax data-parallax-speed="-7">
                    <span class="landing-floater__label">Interaction</span>
                    <strong class="landing-floater__title">Proposal reviewed</strong>
                    <p class="landing-floater__meta">last touch: today</p>
                </div>
                <div class="landing-floater landing-floater--15" data-parallax data-parallax-speed="12">
                    <span class="landing-floater__label">Reminder</span>
                    <strong class="landing-floater__title">Next step visible</strong>
                    <p class="landing-floater__meta">no deal left cold</p>
                </div>
                <div class="landing-floater landing-floater--16" data-parallax data-parallax-speed="-8">
                    <span class="landing-floater__label">Contact</span>
                    <strong class="landing-floater__title">Lucia Gomez</strong>
                    <p class="landing-floater__meta">role: ops lead</p>
                </div>
                <div class="landing-floater landing-floater--17" data-parallax data-parallax-speed="7">
                    <span class="landing-floater__label">Company</span>
                    <strong class="landing-floater__title">Atlas Commerce</strong>
                    <p class="landing-floater__meta">country: AR</p>
                </div>
                <div class="landing-floater landing-floater--18" data-parallax data-parallax-speed="-10">
                    <span class="landing-floater__label">Quotation</span>
                    <strong class="landing-floater__title">$12,000 implementation</strong>
                    <p class="landing-floater__meta">stage: viewed</p>
                </div>
                <div class="landing-floater landing-floater--19" data-parallax data-parallax-speed="9">
                    <span class="landing-floater__label">Follow-up</span>
                    <strong class="landing-floater__title">Send recap</strong>
                    <p class="landing-floater__meta">due: tomorrow</p>
                </div>
                <div class="landing-floater landing-floater--20" data-parallax data-parallax-speed="-7">
                    <span class="landing-floater__label">Interaction</span>
                    <strong class="landing-floater__title">Pricing discussion</strong>
                    <p class="landing-floater__meta">last touch: yesterday</p>
                </div>
                <div class="landing-floater landing-floater--21" data-parallax data-parallax-speed="6">
                    <span class="landing-floater__label">Deal</span>
                    <strong class="landing-floater__title">Expansion opportunity</strong>
                    <p class="landing-floater__meta">status: warm</p>
                </div>
                <div class="landing-floater landing-floater--22" data-parallax data-parallax-speed="-12">
                    <span class="landing-floater__label">CRM</span>
                    <strong class="landing-floater__title">Signal detected</strong>
                    <p class="landing-floater__meta">reply received</p>
                </div>
                <div class="landing-floater landing-floater--23" data-parallax data-parallax-speed="8">
                    <span class="landing-floater__label">Task</span>
                    <strong class="landing-floater__title">Update proposal</strong>
                    <p class="landing-floater__meta">owner: silvio</p>
                </div>
                <div class="landing-floater landing-floater--24" data-parallax data-parallax-speed="-9">
                    <span class="landing-floater__label">Pipeline</span>
                    <strong class="landing-floater__title">Negotiation 09</strong>
                    <p class="landing-floater__meta">won rate: 31%</p>
                </div>
                <div class="landing-floater landing-floater--25" data-parallax data-parallax-speed="11">
                    <span class="landing-floater__label">Reminder</span>
                    <strong class="landing-floater__title">No silent deals</strong>
                    <p class="landing-floater__meta">follow-through matters</p>
                </div>
            </div>

            <header class="relative z-10 w-full px-5 pt-5 sm:px-6 lg:px-10">
                <nav class="landing-nav">
                    <x-app-logo href="{{ route('home') }}" class="landing-logo -ml-1 md:-ml-3 lg:-ml-6" />

                    <div class="hidden items-center gap-8 text-sm font-medium text-white/70 lg:flex">
                        <a href="#solution" class="transition hover:text-white">Solution</a>
                        <a href="#features" class="transition hover:text-white">Features</a>
                        <a href="#workflow" class="transition hover:text-white">Workflow</a>
                        <a href="#tech" class="transition hover:text-white">Stack</a>
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" class="landing-link">
                            Try the demo
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
                        <div class="landing-reveal is-visible space-y-6 lg:pt-10">
                            <p class="landing-brand-mark">FollowUp</p>

                            <span class="landing-badge">
                                Open source CRM for focused sales
                            </span>

                            <div class="space-y-4">
                                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:gap-6">
                                    <h1 class="landing-hero-title lg:max-w-[17ch]">
                                        Stop losing deals because follow-ups were left for later
                                    </h1>
                                </div>
                                <p class="landing-hero-copy">
                                    FollowUp is a lightweight CRM for freelancers, developers and small teams who need to manage companies, contacts, conversations and deals without losing context.
                                </p>
                            </div>

                            <div class="landing-trust-strip">
                                <div class="landing-trust-item">
                                    <span class="landing-trust-item__dot"></span>
                                    <strong>Free forever</strong>
                                </div>
                                <div class="landing-trust-item">
                                    <span class="landing-trust-item__dot"></span>
                                    <strong>Self-hosted</strong>
                                </div>
                                <div class="landing-trust-item">
                                    <span class="landing-trust-item__dot"></span>
                                    <strong>Built for real workflows</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="landing-reveal" data-reveal>
                        <div class="landing-hero-board">
                            <div class="landing-hero-board__glow"></div>

                            <div class="landing-hero-board__topbar">
                                <div>
                                    <p class="landing-card-kicker">Execution cockpit</p>
                                    <h2 class="landing-card-title">Clear next steps, visible context, fewer forgotten deals</h2>
                                </div>
                                <span class="landing-live-pill">
                                    <span class="landing-live-pill__dot"></span>
                                    Active
                                </span>
                            </div>

                            <div class="grid gap-4 xl:grid-cols-[1.15fr_0.85fr]">
                                <div class="space-y-4">
                                    <div class="landing-panel landing-panel--hero-cut">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <p class="landing-panel__eyebrow">Today’s follow-ups</p>
                                                <p class="landing-panel__headline">The work that matters today is already surfaced</p>
                                            </div>
                                            <span class="landing-chip landing-chip--danger">6 due now</span>
                                        </div>

                                        <div class="mt-5 space-y-3">
                                            <div class="landing-task-card">
                                                <div>
                                                    <p class="landing-task-card__title">Acme Logistics</p>
                                                    <p class="landing-task-card__meta">Quotation sent • Follow-up due at 16:30</p>
                                                </div>
                                                <span class="landing-chip">High intent</span>
                                            </div>
                                            <div class="landing-task-card">
                                                <div>
                                                    <p class="landing-task-card__title">Northstar Retail</p>
                                                    <p class="landing-task-card__meta">Waiting on reply from decision maker</p>
                                                </div>
                                                <span class="landing-chip landing-chip--brand">Reply pending</span>
                                            </div>
                                            <div class="landing-task-card">
                                                <div>
                                                    <p class="landing-task-card__title">Vertex Partners</p>
                                                    <p class="landing-task-card__meta">New proposal prepared after discovery call</p>
                                                </div>
                                                <span class="landing-chip landing-chip--success">Ready to send</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="landing-metric-ribbon">
                                        <div class="landing-kpi-card">
                                            <span class="landing-kpi-card__label">Prospects in motion</span>
                                            <strong class="landing-kpi-card__value">128</strong>
                                        </div>
                                        <div class="landing-kpi-card">
                                            <span class="landing-kpi-card__label">Follow-ups today</span>
                                            <strong class="landing-kpi-card__value">24</strong>
                                        </div>
                                        <div class="landing-kpi-card">
                                            <span class="landing-kpi-card__label">On-time execution</span>
                                            <strong class="landing-kpi-card__value">92%</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div class="landing-panel landing-panel--stack landing-panel--tall">
                                        <p class="landing-panel__eyebrow">Pipeline motion</p>
                                        <p class="landing-panel__subcopy">See where conversations are moving and where they are stalling.</p>
                                        <div class="mt-5 space-y-4">
                                            <div class="landing-stage">
                                                <div class="landing-stage__label">
                                                    <span>Discovery</span>
                                                    <span>34</span>
                                                </div>
                                                <div class="landing-stage__bar">
                                                    <span style="width: 82%"></span>
                                                </div>
                                            </div>
                                            <div class="landing-stage">
                                                <div class="landing-stage__label">
                                                    <span>Proposal</span>
                                                    <span>18</span>
                                                </div>
                                                <div class="landing-stage__bar">
                                                    <span style="width: 58%"></span>
                                                </div>
                                            </div>
                                            <div class="landing-stage">
                                                <div class="landing-stage__label">
                                                    <span>Negotiation</span>
                                                    <span>9</span>
                                                </div>
                                                <div class="landing-stage__bar">
                                                    <span style="width: 39%"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="landing-note-band">
                                        <p>FollowUp is opinionated about one thing: every open conversation should have a visible next step.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="landing-reveal mt-24" data-reveal>
                    <div class="landing-section-header">
                        <p class="landing-section-kicker">The problem</p>
                        <h2 class="landing-section-title">This is where most opportunities get lost</h2>
                        <p class="landing-section-copy">
                            Not because the lead was bad. Not because the offer was weak. Most deals die because information is scattered, follow-ups are delayed, and nobody has a clear next step.
                        </p>
                    </div>

                    <div class="landing-problem-grid">
                        <article class="landing-problem-card landing-problem-card--wide">
                            <p class="landing-value-card__eyebrow">Scattered information</p>
                            <h3 class="landing-value-card__title">Client details live across email threads, spreadsheets, chats and notes.</h3>
                        </article>
                        <article class="landing-problem-card">
                            <p class="landing-value-card__eyebrow">Missed follow-ups</p>
                            <h3 class="landing-value-card__title">A good opportunity goes cold because nobody followed up at the right time.</h3>
                        </article>
                        <article class="landing-problem-card">
                            <p class="landing-value-card__eyebrow">Lost context</p>
                            <h3 class="landing-value-card__title">You remember the company, but not the conversation, the promise or the last step.</h3>
                        </article>
                        <article class="landing-problem-card landing-problem-card--accent">
                            <p class="landing-value-card__eyebrow">Slow deal movement</p>
                            <h3 class="landing-value-card__title">Quotations, replies and next actions are not tracked in one clear workflow.</h3>
                        </article>
                    </div>
                </section>

                <section id="solution" class="landing-reveal mt-24 grid gap-8 xl:grid-cols-[0.78fr_1.22fr]" data-reveal>
                    <div class="landing-section-header landing-section-header--sticky">
                        <p class="landing-section-kicker">The solution</p>
                        <h2 class="landing-section-title">Everything you need to move deals forward — nothing you don’t</h2>
                        <p class="landing-section-copy">
                            FollowUp centralizes the commercial workflow in one clean system, so you can keep context, act on time and operate your pipeline without friction.
                        </p>
                    </div>

                    <div class="landing-solution-flow">
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">01</span>
                            <div>
                                <h3 class="landing-feature-item__title">Companies</h3>
                                <p class="landing-feature-item__copy">Keep every prospect and client organized in one place.</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">02</span>
                            <div>
                                <h3 class="landing-feature-item__title">Contacts</h3>
                                <p class="landing-feature-item__copy">Know who you spoke with, where they belong and what matters.</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">03</span>
                            <div>
                                <h3 class="landing-feature-item__title">Interactions</h3>
                                <p class="landing-feature-item__copy">Register calls, emails, meetings and key moments with context.</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">04</span>
                            <div>
                                <h3 class="landing-feature-item__title">Follow-ups</h3>
                                <p class="landing-feature-item__copy">Turn intentions into scheduled next steps with due dates.</p>
                            </div>
                        </article>
                        <article class="landing-solution-item">
                            <span class="landing-solution-item__index">05</span>
                            <div>
                                <h3 class="landing-feature-item__title">Quotations</h3>
                                <p class="landing-feature-item__copy">Track proposals, negotiation stages and deal progress.</p>
                            </div>
                        </article>
                    </div>
                </section>

                <section id="features" class="landing-reveal mt-24" data-reveal>
                    <div class="landing-section-header">
                        <h2 class="landing-section-title">Built for execution, not CRM bureaucracy</h2>
                        <p class="landing-section-copy">
                            FollowUp focuses on the actions that actually move opportunities forward. No bloated workflows, no unnecessary complexity.
                        </p>
                    </div>

                    <div class="landing-feature-grid">
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">Follow-ups with due dates</p>
                            <h3 class="landing-value-card__title">Schedule the next action clearly, so no opportunity depends on memory alone.</h3>
                        </article>
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">Interaction timeline</p>
                            <h3 class="landing-value-card__title">See the full relationship history with each company in one place.</h3>
                        </article>
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">Daily focus dashboard</p>
                            <h3 class="landing-value-card__title">Start the day knowing what needs attention now, not after digging through tools.</h3>
                        </article>
                        <article class="landing-feature-slab">
                            <p class="landing-value-card__eyebrow">Deal tracking</p>
                            <h3 class="landing-value-card__title">Track movement from first contact to closed deal with clear status visibility.</h3>
                        </article>
                        <article class="landing-feature-slab landing-feature-slab--wide">
                            <p class="landing-value-card__eyebrow">Fast and simple UI</p>
                            <h3 class="landing-value-card__title">A clean interface designed to reduce friction and help you move quickly.</h3>
                        </article>
                    </div>
                </section>

                <section id="workflow" class="landing-reveal mt-24 grid gap-8 xl:grid-cols-[0.88fr_1.12fr]" data-reveal>
                    <div class="landing-section-header">
                        <p class="landing-section-kicker">Simple workflow</p>
                        <h2 class="landing-section-title">From first contact to closed deal</h2>
                        <p class="landing-section-copy">
                            A straightforward workflow designed to help you keep momentum, stay organized and follow through consistently.
                        </p>
                    </div>

                    <div class="landing-workflow-path">
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">A</span>
                            <div>
                                <h3 class="landing-workflow-step__title">Add company</h3>
                                <p class="landing-workflow-step__copy">Create a record for each prospect or client.</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">B</span>
                            <div>
                                <h3 class="landing-workflow-step__title">Add contacts</h3>
                                <p class="landing-workflow-step__copy">Link the right people to each opportunity.</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">C</span>
                            <div>
                                <h3 class="landing-workflow-step__title">Log interaction</h3>
                                <p class="landing-workflow-step__copy">Capture calls, emails, meetings and relevant notes.</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">D</span>
                            <div>
                                <h3 class="landing-workflow-step__title">Schedule follow-up</h3>
                                <p class="landing-workflow-step__copy">Define the next step with a due date.</p>
                            </div>
                        </div>
                        <div class="landing-workflow-step landing-workflow-step--path">
                            <span class="landing-workflow-step__index">E</span>
                            <div>
                                <h3 class="landing-workflow-step__title">Move the deal forward</h3>
                                <p class="landing-workflow-step__copy">Keep context, stay consistent and close with intention.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="demo" class="landing-reveal mt-24" data-reveal>
                    <div class="landing-section-header">
                        <h2 class="landing-section-title">A CRM that feels clear the moment you open it</h2>
                        <p class="landing-section-copy">
                            FollowUp is designed to reduce noise and make the next action obvious. Clean screens, focused workflows and context where it matters.
                        </p>
                    </div>

                    <div class="landing-demo-grid">
                        <article class="landing-demo-panel">
                            <p class="landing-value-card__eyebrow">Company context</p>
                            <h3 class="landing-demo-panel__title">Each company becomes a readable commercial thread, not a disconnected record.</h3>
                            <p class="landing-demo-panel__copy">Details, contacts, current stage and pending work stay together so decisions happen with context.</p>
                        </article>
                        <article class="landing-demo-panel landing-demo-panel--offset">
                            <p class="landing-value-card__eyebrow">Today’s follow-ups</p>
                            <h3 class="landing-demo-panel__title">The dashboard highlights what needs action now.</h3>
                            <p class="landing-demo-panel__copy">No hunting through notes, no guessing what comes next, no silent opportunities slipping behind.</p>
                        </article>
                        <article class="landing-demo-panel">
                            <p class="landing-value-card__eyebrow">Interaction history</p>
                            <h3 class="landing-demo-panel__title">Calls, emails, meetings and promises remain visible over time.</h3>
                            <p class="landing-demo-panel__copy">You can reopen any deal and recover the full story in seconds.</p>
                        </article>
                    </div>
                </section>

                <section id="tech" class="landing-reveal mt-24 grid gap-8 xl:grid-cols-[0.82fr_1.18fr]" data-reveal>
                    <div class="landing-section-header">
                        <h2 class="landing-section-title">Modern stack, simple deployment</h2>
                        <p class="landing-section-copy">
                            Built with a modern Laravel stack and designed to be easy to self-host, extend and evolve.
                        </p>
                    </div>

                    <div class="landing-tech-rack">
                        <div class="landing-tech-pill">Laravel 13</div>
                        <div class="landing-tech-pill">Livewire 4</div>
                        <div class="landing-tech-pill">Flux UI 2</div>
                        <div class="landing-tech-pill">Tailwind CSS 4</div>
                        <div class="landing-tech-pill">Vite 8</div>
                        <div class="landing-tech-pill">Pest 4</div>
                        <div class="landing-tech-pill">PHP 8.3</div>
                        <div class="landing-tech-pill">MySQL-ready</div>
                    </div>
                </section>

                <section class="landing-reveal mt-24" data-reveal>
                    <div class="landing-cta-banner">
                        <div>
                            <h2 class="landing-section-title max-w-3xl">Stop relying on memory to manage your pipeline</h2>
                            <p class="mt-4 max-w-3xl text-base leading-8 text-black-700">
                                FollowUp gives you structure, visibility and momentum, so you can manage opportunities with more consistency and less friction.
                            </p>
                        </div>

                        <div class="flex items-center gap-3">
                            <a href="https://github.com/EzeArcich" target="_blank" rel="noreferrer" class="landing-social-button" aria-label="GitHub">
                                <svg viewBox="0 0 24 24" class="size-5" fill="currentColor" aria-hidden="true">
                                    <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.426 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.866-.013-1.699-2.782.605-3.369-1.344-3.369-1.344-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.004.071 1.532 1.034 1.532 1.034.892 1.53 2.341 1.088 2.91.832.091-.647.35-1.088.636-1.338-2.221-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.987 1.029-2.687-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.56 9.56 0 0 1 12 6.844a9.56 9.56 0 0 1 2.504.337c1.909-1.296 2.748-1.026 2.748-1.026.546 1.378.203 2.397.1 2.65.64.7 1.028 1.594 1.028 2.687 0 3.848-2.338 4.695-4.566 4.943.359.31.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.481A10.019 10.019 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z"/>
                                </svg>
                            </a>
                            <a href="https://www.linkedin.com/in/silvio-arcich-5629841ba/" target="_blank" rel="noreferrer" class="landing-social-button" aria-label="LinkedIn">
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
