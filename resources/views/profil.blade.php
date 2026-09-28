@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <section class="py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Profile header --}}
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-8 mb-12" data-reveal>
                {{-- Photo with MR initials fallback --}}
                @php
                    $photoExists = file_exists(public_path($profil['foto']));
                @endphp

                @if($photoExists)
                    <img src="{{ asset($profil['foto']) }}"
                         alt="Photo of {{ $profil['nama'] }}"
                         width="160"
                         height="160"
                         class="w-32 h-32 sm:w-40 sm:h-40 rounded-2xl object-cover ring-4 ring-teal-100 dark:ring-teal-900/40 shadow-lg flex-shrink-0">
                @else
                    {{-- Initials fallback --}}
                    <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-2xl bg-gradient-to-br from-navy-700 to-teal-700 dark:from-navy-600 dark:to-teal-600 flex items-center justify-center ring-4 ring-teal-100 dark:ring-teal-900/40 shadow-lg flex-shrink-0"
                         role="img"
                         aria-label="Profile photo placeholder for {{ $profil['nama'] }}">
                        <span class="text-4xl sm:text-5xl font-display font-bold text-white tracking-wide">MR</span>
                    </div>
                @endif

                <div class="text-center sm:text-left">
                    {{-- EDIT ME: Update name and personal details --}}
                    <h1 class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-navy-900 dark:text-white">
                        {{ $profil['nama'] }}
                    </h1>
                    <p class="mt-1 text-teal-600 dark:text-teal-400 font-medium">{{ $profil['nrp'] }}</p>
                    <p class="mt-1 text-navy-600 dark:text-navy-300">{{ $profil['program'] }}</p>
                    <p class="text-navy-500 dark:text-navy-400">{{ $profil['universitas'] }}</p>
                    <p class="text-sm text-navy-400 dark:text-navy-500 mt-1">{{ $profil['lokasi'] }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- About --}}
                <div class="lg:col-span-2 space-y-6">
                    <x-info-card variant="elevated" data-reveal>
                        <x-slot:header>
                            <h2 class="font-display font-semibold text-lg text-navy-900 dark:text-white">About</h2>
                        </x-slot:header>

                        <p class="text-navy-600 dark:text-navy-300 leading-relaxed">{{ $profil['bio'] }}</p>
                    </x-info-card>

                    {{-- Experience --}}
                    <x-info-card variant="elevated" data-reveal>
                        <x-slot:header>
                            <h2 class="font-display font-semibold text-lg text-navy-900 dark:text-white">Experience</h2>
                        </x-slot:header>

                        @forelse($experience as $exp)
                            <div class="{{ !$loop->last ? 'pb-4 mb-4 border-b border-navy-100 dark:border-navy-800' : '' }}">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1">
                                    <h3 class="font-semibold text-navy-900 dark:text-white">{{ $exp['role'] }}</h3>
                                    <span class="text-sm text-navy-400 dark:text-navy-500">{{ $exp['period'] }}</span>
                                </div>
                                <p class="text-sm text-teal-600 dark:text-teal-400 font-medium mt-0.5">{{ $exp['company'] }}</p>
                                <p class="mt-2 text-sm text-navy-600 dark:text-navy-300 leading-relaxed">{{ $exp['desc'] }}</p>
                            </div>
                        @empty
                            <p class="text-navy-400 dark:text-navy-500 italic">No experience listed yet.</p>
                        @endforelse

                        <x-slot:footer>
                            {{-- EDIT ME: Update with real experience details --}}
                            <p class="text-xs text-navy-400 dark:text-navy-500">Experience details can be updated in the controller.</p>
                        </x-slot:footer>
                    </x-info-card>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Skills --}}
                    <x-info-card variant="elevated" data-reveal>
                        <x-slot:header>
                            <h2 class="font-display font-semibold text-lg text-navy-900 dark:text-white">Skills</h2>
                        </x-slot:header>

                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium transition-colors
                                    {{ $loop->first ? 'bg-teal-100 text-teal-800 dark:bg-teal-900/30 dark:text-teal-300' : '' }}
                                    {{ $loop->last ? 'bg-navy-100 text-navy-700 dark:bg-navy-800 dark:text-navy-300' : '' }}
                                    {{ !$loop->first && !$loop->last ? 'bg-navy-50 text-navy-700 dark:bg-navy-800/60 dark:text-navy-300' : '' }}
                                    hover:bg-teal-100 hover:text-teal-800 dark:hover:bg-teal-900/30 dark:hover:text-teal-300">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>

                        <x-slot:footer>
                            <p class="text-xs text-navy-400 dark:text-navy-500">{{ count($skills) }} skills · Skill #{{ $loop->iteration ?? count($skills) }}</p>
                        </x-slot:footer>
                    </x-info-card>

                    {{-- Career Interests --}}
                    <x-info-card variant="elevated" data-reveal>
                        <x-slot:header>
                            <h2 class="font-display font-semibold text-lg text-navy-900 dark:text-white">Career Interests</h2>
                        </x-slot:header>

                        <ul class="space-y-2.5">
                            @foreach($interests as $interest)
                                <li class="flex items-start gap-2.5">
                                    <svg class="w-5 h-5 text-teal-500 dark:text-teal-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/>
                                    </svg>
                                    <span class="text-sm text-navy-600 dark:text-navy-300">{{ $interest }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </x-info-card>
                </div>
            </div>
        </div>
    </section>
@endsection
