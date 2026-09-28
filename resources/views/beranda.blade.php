@extends('layouts.app')

@section('title', 'Home')

@section('content')
    {{-- Welcome banner --}}
    @isset($user)
        @if($user)
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
                <x-status-banner tipe="success">
                    Welcome, {{ $user }}!
                </x-status-banner>
            </div>
        @endif
    @endisset

    {{-- Hero section --}}
    <section class="relative overflow-hidden min-h-[60svh] flex items-center">


        {{-- Hero content --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 sm:py-28">
            <div class="max-w-3xl">
                <p class="text-teal-300 font-display font-semibold text-sm tracking-widest uppercase mb-4" data-reveal>
                    Agentic AI Platform
                </p>
                <h1 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl text-white leading-tight" data-reveal>
                    Personalized Agentic AI for Intelligent Job Discovery
                </h1>
                <p class="mt-5 text-lg text-navy-200 max-w-2xl leading-relaxed" data-reveal>
                    An AI career agent that analyzes your profile, discovers relevant opportunities, prioritizes the best-fit jobs, and tailors your application materials — all in one intelligent pipeline.
                </p>
                <div class="mt-8 flex flex-wrap gap-3" data-reveal>
                    <a href="{{ $nav['ideAgent'] }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-teal-500 hover:bg-teal-400 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-teal-500/25 hover:shadow-teal-400/30 hover:-translate-y-0.5">
                        Explore Research
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ $nav['profil'] }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl transition-all duration-200 border border-white/20 backdrop-blur-sm">
                        View Profile
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Value strip --}}
    <section class="bg-white dark:bg-surface-dark-raised border-y border-navy-100 dark:border-navy-800" aria-label="Key benefits">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($values as $value)
                    <div class="flex items-start gap-4" data-reveal>
                        <div class="flex-shrink-0 w-12 h-12 rounded-xl bg-gradient-to-br from-teal-50 to-teal-100 dark:from-teal-900/30 dark:to-teal-800/20 flex items-center justify-center">
                            @if($value['icon'] === 'user-check')
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 8l2 2-2 2"/></svg>
                            @elseif($value['icon'] === 'trending-up')
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                            @else
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            @endif
                        </div>
                        <div>
                            <h3 class="font-display font-semibold text-lg text-navy-900 dark:text-white">{{ $value['title'] }}</h3>
                            <p class="mt-1 text-sm text-navy-500 dark:text-navy-400 leading-relaxed">{{ $value['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- How it works --}}
    <section class="py-16 sm:py-20" aria-label="How it works">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <x-section-heading subtitle="Three simple steps from your profile to personalized job recommendations">
                    How It Works
                </x-section-heading>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
                @foreach($steps as $step)
                    <x-info-card variant="elevated" class="text-center" data-reveal>
                        <x-slot:header>
                            <div class="flex items-center justify-center">
                                <span class="w-10 h-10 rounded-full bg-gradient-to-br from-teal-500 to-teal-600 text-white font-display font-bold flex items-center justify-center text-lg">
                                    {{ $step['num'] }}
                                </span>
                            </div>
                        </x-slot:header>

                        <h3 class="font-display font-semibold text-lg text-navy-900 dark:text-white mb-2">{{ $step['title'] }}</h3>
                        <p class="text-sm text-navy-500 dark:text-navy-400 leading-relaxed">{{ $step['desc'] }}</p>
                    </x-info-card>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA section --}}
    <section class="py-16 bg-gradient-to-br from-navy-900 via-navy-800 to-teal-900 dark:from-navy-950 dark:via-navy-900 dark:to-teal-950" aria-label="Call to action">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-reveal>
            <h2 class="font-display font-bold text-2xl sm:text-3xl text-white mb-4">
                Ready to Explore the Research?
            </h2>
            <p class="text-navy-200 max-w-xl mx-auto mb-8">
                Discover how agentic AI can transform the job application process from a manual chore into an intelligent, personalized experience.
            </p>
            <a href="{{ $nav['ideAgent'] }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 bg-teal-500 hover:bg-teal-400 text-white font-semibold rounded-xl transition-all duration-200 shadow-lg shadow-teal-500/25 hover:shadow-teal-400/30 hover:-translate-y-0.5">
                View the Agent Pipeline
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>
@endsection
