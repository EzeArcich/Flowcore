<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky collapsible="mobile" class="crm-sidebar-shell border-e border-zinc-200/85 dark:border-zinc-700/85">
            <flux:sidebar.header>
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
                <flux:sidebar.collapse class="lg:hidden" />
            </flux:sidebar.header>

            <flux:sidebar.nav>
                @php
                    $todayDate = now()->toDateString();
                    $overdueFollowUpsCount = \App\Models\FollowUp::query()
                        ->where('status', 'pending')
                        ->whereDate('due_date', '<', $todayDate)
                        ->count();
                    $todayFollowUpsCount = \App\Models\FollowUp::query()
                        ->where('status', 'pending')
                        ->whereDate('due_date', $todayDate)
                        ->count();
                    $allPendingFollowUpsCount = \App\Models\FollowUp::query()
                        ->where('status', 'pending')
                        ->count();
                    $isFollowUpsSection = request()->routeIs('follow-ups.*');
                @endphp

                <flux:sidebar.group :heading="__('Platform')" class="grid">
                    <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="building-office-2" :href="route('companies.index')" :current="request()->routeIs('companies.*')" wire:navigate>
                        {{ __('Empresas') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>

                <flux:sidebar.group :heading="__('Follow-ups')" expandable :expanded="$isFollowUpsSection" class="grid">
                    <flux:sidebar.item icon="clock" :href="route('follow-ups.index')" :current="request()->routeIs('follow-ups.*') && ! request()->has('due')" wire:navigate>
                        <span class="flex w-full items-center justify-between gap-2">
                            <span>{{ __('Todos') }}</span>
                            <span class="rounded-full bg-zinc-200 px-2 py-0.5 text-[11px] font-semibold text-zinc-700 dark:bg-zinc-700 dark:text-zinc-100">
                                {{ $allPendingFollowUpsCount }}
                            </span>
                        </span>
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="calendar-days" :href="route('follow-ups.index', ['due' => 'today'])" :current="request()->routeIs('follow-ups.*') && request('due') === 'today'" wire:navigate>
                        <span class="flex w-full items-center justify-between gap-2">
                            <span>{{ __('De hoy') }}</span>
                            <span class="rounded-full bg-sky-100 px-2 py-0.5 text-[11px] font-semibold text-sky-700 dark:bg-sky-900/70 dark:text-sky-200">
                                {{ $todayFollowUpsCount }}
                            </span>
                        </span>
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="exclamation-triangle" :href="route('follow-ups.index', ['due' => 'overdue'])" :current="request()->routeIs('follow-ups.*') && request('due') === 'overdue'" wire:navigate>
                        <span class="flex w-full items-center justify-between gap-2">
                            <span>{{ __('Vencidos') }}</span>
                            <span class="rounded-full bg-rose-100 px-2 py-0.5 text-[11px] font-semibold text-rose-700 dark:bg-rose-900/70 dark:text-rose-200">
                                {{ $overdueFollowUpsCount }}
                            </span>
                        </span>
                    </flux:sidebar.item>
                </flux:sidebar.group>

                <flux:sidebar.group :heading="__('Quick Actions')" class="grid">
                    <flux:sidebar.item icon="clipboard-document-list" :href="route('follow-ups.create')" :current="request()->routeIs('follow-ups.create')" wire:navigate>
                        {{ __('Nuevo follow-up') }}
                    </flux:sidebar.item>

                    <flux:sidebar.item icon="plus" :href="route('companies.create')" :current="request()->routeIs('companies.create')" wire:navigate>
                        {{ __('Nueva empresa') }}
                    </flux:sidebar.item>
                </flux:sidebar.group>
            </flux:sidebar.nav>

            <flux:spacer />

            <flux:sidebar.nav>
                 <!-- Parte baja del Sidebar -->
            </flux:sidebar.nav>

            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu>
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <flux:avatar
                                    :name="auth()->user()->name"
                                    :initials="auth()->user()->initials()"
                                />

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <flux:heading class="truncate">{{ auth()->user()->name }}</flux:heading>
                                    <flux:text class="truncate">{{ auth()->user()->email }}</flux:text>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate>
                            {{ __('Settings') }}
                        </flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item
                            as="button"
                            type="submit"
                            icon="arrow-right-start-on-rectangle"
                            class="w-full cursor-pointer"
                            data-test="logout-button"
                        >
                            {{ __('Log out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
