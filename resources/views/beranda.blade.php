@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="h-full flex flex-col justify-center p-4 sm:p-8 lg:p-12 relative overflow-y-auto">
        {{-- Welcome banner --}}
        @isset($user)
            @if($user)
                <div class="absolute top-4 sm:top-8 left-4 sm:left-8 right-4 sm:right-8 z-20">
                    <x-status-banner tipe="success">
                        Welcome, {{ $user }}!
                    </x-status-banner>
                </div>
            @endif
        @endisset

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center min-h-full">
            {{-- Left Column: Intro --}}
            <div class="flex flex-col gap-6" data-reveal>
                <div class="bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] w-max px-4 py-1.5 rounded-full border border-black/5 dark:border-white/5 text-xs font-semibold text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] uppercase tracking-wider">
                    Research Project
                </div>
                
                <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] leading-[1.1] tracking-tight">
                    A smarter way to apply for jobs.
                </h1>
                
                <p class="text-lg text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] leading-relaxed max-w-md">
                    This AI agent reads your profile, finds relevant job openings, and helps you prioritize applications. It cuts out the manual work so you can focus on interviews.
                </p>
                
                <div class="flex flex-wrap items-center gap-4 pt-4">
                    <a href="{{ $nav['ideAgent'] ?? '/ide-agent' }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-[var(--color-orange)] text-white font-semibold shadow-lg shadow-[var(--color-orange)]/25 hover:scale-105 transition-transform">
                        See how it works
                    </a>
                    <a href="{{ $nav['profil'] ?? '/profil-mahasiswa' }}" class="inline-flex items-center gap-2 px-6 py-3.5 rounded-full bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border border-black/5 dark:border-white/5 text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] font-semibold hover:bg-black/5 dark:hover:bg-white/5 transition-colors">
                        View my profile
                    </a>
                </div>
            </div>

            {{-- Right Column: Visual Panel --}}
            <div class="relative w-full h-[50vh] lg:h-[70vh] min-h-[400px] rounded-3xl overflow-hidden shadow-2xl isolate" data-reveal>
                {{-- Main visual (using the fallback photo area) --}}
                <div class="absolute inset-0 bg-gradient-to-br from-black/10 to-black/30 dark:from-white/5 dark:to-black/40 -z-10 mix-blend-multiply dark:mix-blend-overlay"></div>
                <img src="{{ asset('images/rizky.jpg') }}" alt="Visual representing the AI agent" class="absolute inset-0 w-full h-full object-cover -z-20 opacity-80 dark:opacity-60" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                
                {{-- Fallback if photo missing --}}
                <div class="hidden absolute inset-0 -z-20 bg-[var(--color-charcoal)] items-center justify-center">
                    <div class="text-[var(--color-orange)] opacity-50 font-display text-2xl font-bold tracking-widest uppercase">Agent in Action</div>
                </div>

                {{-- Glass Overlay Bar linking to form --}}
                <div class="absolute bottom-6 left-6 right-6">
                    <a href="{{ $nav['ideAgent'] ?? '/ide-agent' }}#idea-form" class="block w-full backdrop-blur-md bg-white/70 dark:bg-black/50 border border-white/40 dark:border-white/10 rounded-2xl p-4 sm:p-5 shadow-lg group hover:bg-white/80 dark:hover:bg-black/60 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-[var(--color-orange)] flex items-center justify-center text-white">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                </div>
                                <div class="flex flex-col">
                                    <span class="font-bold text-[var(--color-text-light)] dark:text-white">Have a suggestion?</span>
                                    <span class="text-sm text-[var(--color-muted-light)] dark:text-white/70">Submit an idea for this research.</span>
                                </div>
                            </div>
                            <svg class="w-5 h-5 text-[var(--color-muted-light)] dark:text-white/50 group-hover:text-[var(--color-orange)] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
