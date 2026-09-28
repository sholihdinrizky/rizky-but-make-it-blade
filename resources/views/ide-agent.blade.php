@extends('layouts.app')

@section('title', 'Research Ideas')

@section('content')
    <div class="h-full p-4 sm:p-8 lg:p-12 overflow-y-auto scroll-smooth">
        
        {{-- Header Section --}}
        <div class="max-w-4xl mb-16" data-reveal>
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border border-black/5 dark:border-white/5 mb-6 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-[var(--color-orange)]"></span>
                <span class="text-xs font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)]">Research Project</span>
            </div>
            
            <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] leading-[1.1] tracking-tight mb-6">
                Agentic AI for Intelligent Job Discovery
            </h1>
            <p class="text-lg sm:text-xl text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] leading-relaxed max-w-2xl">
                A career agent that helps you decide which jobs to prioritize while preparing personalized applications.
            </p>
        </div>

        {{-- Agent Pipeline (Grid of Flip Cards) --}}
        <section id="pipeline" class="mb-24 scroll-mt-24">
            <div class="flex items-center gap-4 mb-8" data-reveal>
                <div class="w-10 h-10 rounded-full bg-[var(--color-orange)] flex items-center justify-center text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                </div>
                <h2 class="font-display font-bold text-2xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">The Pipeline</h2>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6">
                @foreach($pipeline as $index => $stage)
                    <div data-reveal style="transition-delay: {{ $index * 50 }}ms">
                        <x-info-card>
                            <x-slot:header>
                                <span class="text-sm font-bold tracking-wider uppercase text-[var(--color-orange)]">Stage {{ $index + 1 }}</span>
                            </x-slot:header>
                            
                            {{-- Front --}}
                            {{ $stage['title'] }}
                            
                            {{-- Back --}}
                            <x-slot:back>
                                <div class="flex flex-col h-full text-left">
                                    <h4 class="font-bold text-white mb-2 text-lg leading-tight border-b border-white/20 pb-2">{{ $stage['title'] }}</h4>
                                    <p class="text-white/90 mb-4">{{ $stage['desc'] }}</p>
                                    <div class="mt-auto space-y-2 text-xs">
                                        <div class="flex gap-2"><span class="font-bold text-white/50 w-8">IN:</span><span>{{ $stage['input'] }}</span></div>
                                        <div class="flex gap-2"><span class="font-bold text-white/50 w-8">OUT:</span><span>{{ $stage['output'] }}</span></div>
                                    </div>
                                </div>
                            </x-slot:back>
                        </x-info-card>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Goals (Pill Rows) --}}
        <section id="goals" class="mb-24 scroll-mt-24" data-reveal>
            <div class="flex items-center gap-4 mb-8">
                <div class="w-10 h-10 rounded-full bg-[var(--color-charcoal)] dark:bg-white flex items-center justify-center text-white dark:text-black">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h2 class="font-display font-bold text-2xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">Project Goals</h2>
            </div>
            
            <div class="flex flex-col gap-3">
                @foreach($goals as $goal)
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-5 sm:p-6 bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] rounded-3xl border border-black/5 dark:border-white/5 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] flex items-center justify-center text-[var(--color-orange)] flex-shrink-0">
                                @if($goal['icon'] === 'search')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                @elseif($goal['icon'] === 'target')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                @elseif($goal['icon'] === 'edit')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @endif
                            </div>
                            <h3 class="font-bold text-lg text-[var(--color-text-light)] dark:text-[var(--color-text-dark)]">{{ $goal['title'] }}</h3>
                        </div>
                        <p class="text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] text-sm sm:max-w-md sm:text-right leading-relaxed">{{ $goal['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Idea Form (Pill Inputs) --}}
        <section id="idea-form" class="max-w-2xl scroll-mt-24 pb-12" data-reveal>
            <div class="mb-8">
                <h2 class="font-display font-bold text-3xl text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] mb-3">Submit an Idea</h2>
                <p class="text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)]">Have a suggestion for the research? Let me know.</p>
            </div>

            @if(session('success'))
                <div class="mb-8">
                    <x-status-banner tipe="success">{{ session('success') }}</x-status-banner>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-8">
                    <x-status-banner tipe="error">
                        <ul class="list-none space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-status-banner>
                </div>
            @endif

            <form method="POST" action="{{ route('ide-agent.submit') }}" class="space-y-6" novalidate>
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="relative group">
                        <label for="name" class="absolute -top-2 left-4 px-1 bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] text-[10px] font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] z-10 transition-colors group-focus-within:text-[var(--color-orange)]">Name *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               class="w-full px-5 py-4 rounded-3xl bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border {{ $errors->has('name') ? 'border-red-500' : 'border-black/5 dark:border-white/5' }} text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] focus:border-[var(--color-orange)] focus:ring-1 focus:ring-[var(--color-orange)] outline-none transition-all shadow-sm">
                    </div>
                    <div class="relative group">
                        <label for="email" class="absolute -top-2 left-4 px-1 bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] text-[10px] font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] z-10 transition-colors group-focus-within:text-[var(--color-orange)]">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-5 py-4 rounded-3xl bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border {{ $errors->has('email') ? 'border-red-500' : 'border-black/5 dark:border-white/5' }} text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] focus:border-[var(--color-orange)] focus:ring-1 focus:ring-[var(--color-orange)] outline-none transition-all shadow-sm">
                    </div>
                </div>

                <div class="relative group">
                    <label for="idea_title" class="absolute -top-2 left-4 px-1 bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] text-[10px] font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] z-10 transition-colors group-focus-within:text-[var(--color-orange)]">Idea Title *</label>
                    <input type="text" id="idea_title" name="idea_title" value="{{ old('idea_title') }}" required
                           class="w-full px-5 py-4 rounded-3xl bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border {{ $errors->has('idea_title') ? 'border-red-500' : 'border-black/5 dark:border-white/5' }} text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] focus:border-[var(--color-orange)] focus:ring-1 focus:ring-[var(--color-orange)] outline-none transition-all shadow-sm">
                </div>

                <div class="relative group">
                    <label for="category" class="absolute -top-2 left-4 px-1 bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] text-[10px] font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] z-10 transition-colors group-focus-within:text-[var(--color-orange)]">Category</label>
                    <select id="category" name="category"
                            class="w-full px-5 py-4 rounded-3xl bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border border-black/5 dark:border-white/5 text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] focus:border-[var(--color-orange)] focus:ring-1 focus:ring-[var(--color-orange)] outline-none transition-all shadow-sm appearance-none cursor-pointer">
                        <option value="">Select a category (optional)</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-5 flex items-center pointer-events-none text-[var(--color-muted-light)]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>

                <div class="relative group">
                    <label for="idea_description" class="absolute -top-2 left-4 px-1 bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] text-[10px] font-bold uppercase tracking-wider text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)] z-10 transition-colors group-focus-within:text-[var(--color-orange)]">Description *</label>
                    <textarea id="idea_description" name="idea_description" rows="4" required
                              class="w-full px-5 py-4 rounded-3xl bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] border {{ $errors->has('idea_description') ? 'border-red-500' : 'border-black/5 dark:border-white/5' }} text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] focus:border-[var(--color-orange)] focus:ring-1 focus:ring-[var(--color-orange)] outline-none transition-all shadow-sm resize-y">{{ old('idea_description') }}</textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full sm:w-auto px-8 py-4 bg-[var(--color-charcoal)] dark:bg-white text-white dark:text-black font-bold rounded-full hover:opacity-90 transition-opacity shadow-lg focus:ring-2 focus:ring-[var(--color-orange)] focus:ring-offset-2 dark:focus:ring-offset-black">
                        Submit Idea
                    </button>
                </div>
            </form>
        </section>
    </div>
@endsection
