@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="h-full p-4 sm:p-8 lg:p-12 overflow-y-auto">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start max-w-7xl mx-auto">
            
            {{-- Left Column: Pills & Info (4 cols) --}}
            <div class="lg:col-span-4 flex flex-col gap-4 order-2 lg:order-1" data-reveal>
                
                {{-- Name & Status --}}
                <div class="bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-6 rounded-3xl border border-black/5 dark:border-white/5 shadow-sm">
                    <h1 class="font-display font-bold text-3xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] mb-1">
                        {{ $profil['nama'] }}
                    </h1>
                    <p class="text-[var(--color-orange)] font-medium mb-4">{{ $profil['nrp'] }}</p>
                    
                    <div class="flex items-center gap-2 text-sm text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                        Student
                    </div>
                </div>

                {{-- Fact Pills --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-4 rounded-3xl border border-black/5 dark:border-white/5 flex flex-col justify-center shadow-sm">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mb-1">Program</span>
                        <span class="text-sm font-medium text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] leading-tight">{{ $profil['program'] }}</span>
                    </div>
                    <div class="bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-4 rounded-3xl border border-black/5 dark:border-white/5 flex flex-col justify-center shadow-sm">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mb-1">University</span>
                        <span class="text-sm font-medium text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] leading-tight">{{ $profil['universitas'] }}</span>
                    </div>
                    <div class="col-span-2 bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-4 rounded-3xl border border-black/5 dark:border-white/5 flex flex-col justify-center shadow-sm">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mb-1">Location</span>
                        <span class="text-sm font-medium text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">{{ $profil['lokasi'] }}</span>
                    </div>
                </div>

                {{-- Stats Rings (Factual) --}}
                <div class="bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-6 rounded-3xl border border-black/5 dark:border-white/5 shadow-sm flex items-center justify-around">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full border-4 border-[var(--color-orange)] flex items-center justify-center font-bold text-xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">
                            {{ count($skills) }}
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mt-2">Skills</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 rounded-full border-4 border-green-500 flex items-center justify-center font-bold text-xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">
                            {{ count($experience) }}
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mt-2">Roles</span>
                    </div>
                </div>
            </div>

            {{-- Right Column: Photo & Details (8 cols) --}}
            <div class="lg:col-span-8 flex flex-col gap-6 order-1 lg:order-2" data-reveal>
                
                {{-- Editorial Photo --}}
                <div class="relative w-full h-64 sm:h-80 lg:h-96 rounded-[2rem] overflow-hidden shadow-lg group">
                    @if(file_exists(public_path($profil['foto'])))
                        <img src="{{ asset($profil['foto']) }}" alt="Rizky" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                        <div class="w-full h-full bg-[var(--color-charcoal)] flex items-center justify-center">
                            <span class="text-6xl font-display font-bold text-white opacity-20">MR</span>
                        </div>
                    @endif
                    
                    {{-- Gradient fade into glass card --}}
                    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-[var(--color-panel-light)] dark:from-[var(--color-panel-dark)] to-transparent"></div>
                    
                    {{-- Glass Bio Card overlapping photo --}}
                    <div class="absolute bottom-4 sm:bottom-6 left-4 sm:left-6 right-4 sm:right-6 backdrop-blur-xl bg-white/60 dark:bg-[var(--color-pill-dark)]/70 border border-white/40 dark:border-white/10 p-5 sm:p-6 rounded-3xl shadow-xl">
                        @if($profil['bio'] !== '<!-- EDIT ME: Add a short, professional summary here -->')
                            <p class="text-sm sm:text-base text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] leading-relaxed font-medium">
                                {{ $profil['bio'] }}
                            </p>
                        @else
                            <p class="text-sm text-[var(--color-muted-light)] italic">Bio summary goes here.</p>
                        @endif
                    </div>
                </div>

                {{-- Pill Tabs (CSS-only via radio inputs and labels) --}}
                <div class="mt-4">
                    <div class="flex flex-wrap gap-2 mb-6" role="tablist">
                        <button type="button" role="tab" aria-selected="true" class="px-6 py-2.5 rounded-full bg-[var(--color-charcoal)] dark:bg-white text-white dark:text-black font-semibold text-sm transition-colors hover:opacity-90">Experience</button>
                        <button type="button" role="tab" aria-selected="false" class="px-6 py-2.5 rounded-full bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border border-black/5 dark:border-white/5 text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] font-semibold text-sm transition-colors hover:bg-black/5 dark:hover:bg-white/5">Skills</button>
                    </div>

                    {{-- Tab Content: Experience --}}
                    <div role="tabpanel" class="space-y-4">
                        @forelse($experience as $exp)
                            <div class="bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-5 sm:p-6 rounded-3xl border border-black/5 dark:border-white/5 shadow-sm">
                                <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2 gap-2">
                                    <h3 class="font-bold text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] text-lg">{{ $exp['role'] }}</h3>
                                    <span class="text-xs font-semibold text-[var(--color-orange)] bg-[var(--color-orange)]/10 px-3 py-1 rounded-full whitespace-nowrap">{{ $exp['period'] }}</span>
                                </div>
                                <p class="text-sm font-medium text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mb-3">{{ $exp['company'] }}</p>
                                @if($exp['desc'] !== '<!-- EDIT ME: Add factual details about the internship -->')
                                    <p class="text-sm text-[var(--color-text-light)] dark:text-white/80 leading-relaxed">{{ $exp['desc'] }}</p>
                                @endif
                            </div>
                        @empty
                            <p class="text-sm text-[var(--color-muted-light)] italic px-4">No experience listed.</p>
                        @endforelse
                    </div>

                    {{-- Tab Content: Skills (Visually separate block for simplicity without complex JS) --}}
                    <div class="mt-8 pt-8 border-t border-black/5 dark:border-white/5">
                        <h2 class="text-sm font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] mb-4 px-2">Tools & Tech</h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="px-4 py-2 rounded-full bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border border-black/5 dark:border-white/5 text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] text-sm font-medium shadow-sm">
                                    {{ $skill }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
