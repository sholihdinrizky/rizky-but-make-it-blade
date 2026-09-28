@extends('layouts.app')

@section('title', 'Research Ideas')

@section('content')
    {{-- Header with small 3D scene --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-navy-900 via-navy-800 to-teal-900 dark:from-navy-950 dark:via-navy-900 dark:to-teal-950">
        <div class="absolute inset-0 scene-container" data-scene="header" aria-hidden="true"
             style="aspect-ratio: 21/9; min-height: 100%;">
            <div class="scene-fallback absolute inset-0 opacity-20">
                <svg class="w-full h-full" viewBox="0 0 800 300" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
                    <circle cx="400" cy="150" r="6" fill="white" opacity="0.8"/>
                    <circle cx="200" cy="80" r="3" fill="white" opacity="0.4"/>
                    <circle cx="600" cy="100" r="4" fill="white" opacity="0.5"/>
                    <circle cx="300" cy="220" r="3" fill="white" opacity="0.3"/>
                    <circle cx="550" cy="230" r="3" fill="white" opacity="0.3"/>
                    <line x1="400" y1="150" x2="200" y2="80" stroke="white" stroke-width="0.5" opacity="0.2"/>
                    <line x1="400" y1="150" x2="600" y2="100" stroke="white" stroke-width="0.5" opacity="0.2"/>
                    <line x1="400" y1="150" x2="300" y2="220" stroke="white" stroke-width="0.5" opacity="0.2"/>
                    <line x1="400" y1="150" x2="550" y2="230" stroke="white" stroke-width="0.5" opacity="0.2"/>
                </svg>
            </div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-20">
            <p class="text-teal-300 font-display font-semibold text-sm tracking-widest uppercase mb-3" data-reveal>Research Project</p>
            <h1 class="font-display font-bold text-2xl sm:text-3xl lg:text-4xl text-white max-w-3xl leading-tight" data-reveal>
                Personalized Agentic AI for Intelligent Job Discovery and Application Preparation
            </h1>
            <p class="mt-4 text-navy-200 max-w-2xl leading-relaxed" data-reveal>
                A career application agent that helps users decide which jobs to prioritize while preparing personalized applications — going beyond simple job search or CV building.
            </p>
        </div>
    </section>

    {{-- Agent Pipeline --}}
    <section class="py-16 sm:py-20" aria-label="Agent pipeline" id="pipeline">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <x-section-heading subtitle="Seven stages from profile intake to a ready-to-submit application kit">
                    The Agent Pipeline
                </x-section-heading>
            </div>

            {{-- Pipeline timeline --}}
            <div class="relative">
                {{-- Desktop connecting line --}}
                <div class="hidden lg:block absolute top-8 left-0 right-0 h-0.5 bg-gradient-to-r from-teal-200 via-teal-400 to-teal-200 dark:from-teal-800 dark:via-teal-600 dark:to-teal-800" aria-hidden="true"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-7 gap-4 lg:gap-3">
                    @foreach($pipeline as $stage)
                        <div class="relative" data-reveal>
                            {{-- Mobile connecting line --}}
                            @if(!$loop->last)
                                <div class="lg:hidden absolute left-6 top-16 bottom-0 w-0.5 bg-teal-200 dark:bg-teal-800 -mb-4" aria-hidden="true"></div>
                            @endif

                            {{-- Stage number --}}
                            <div class="relative z-10 flex lg:justify-center mb-3">
                                <span class="w-12 h-12 lg:w-14 lg:h-14 rounded-full flex items-center justify-center font-display font-bold text-lg
                                    {{ $loop->first ? 'bg-teal-500 text-white shadow-lg shadow-teal-500/30' : '' }}
                                    {{ $loop->last ? 'bg-gradient-to-br from-accent-500 to-accent-600 text-white shadow-lg shadow-accent-500/30' : '' }}
                                    {{ !$loop->first && !$loop->last ? 'bg-white dark:bg-surface-dark-raised text-teal-600 dark:text-teal-400 border-2 border-teal-200 dark:border-teal-700 shadow-sm' : '' }}">
                                    {{ $loop->iteration }}
                                </span>
                            </div>

                            {{-- Stage card --}}
                            <div class="ml-16 lg:ml-0 bg-white dark:bg-surface-dark-raised rounded-xl border border-navy-100 dark:border-navy-800 p-4 shadow-sm hover:shadow-md transition-shadow duration-200">
                                <h3 class="font-display font-semibold text-sm text-navy-900 dark:text-white mb-1.5">{{ $stage['title'] }}</h3>
                                <p class="text-xs text-navy-500 dark:text-navy-400 leading-relaxed mb-3">{{ $stage['desc'] }}</p>
                                <div class="space-y-1.5 text-xs">
                                    <div class="flex items-start gap-1.5">
                                        <span class="text-teal-500 dark:text-teal-400 font-semibold flex-shrink-0">IN:</span>
                                        <span class="text-navy-500 dark:text-navy-400">{{ $stage['input'] }}</span>
                                    </div>
                                    <div class="flex items-start gap-1.5">
                                        <span class="text-accent-600 dark:text-accent-400 font-semibold flex-shrink-0">OUT:</span>
                                        <span class="text-navy-500 dark:text-navy-400">{{ $stage['output'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Goals --}}
    <section class="py-16 bg-white dark:bg-surface-dark-raised border-y border-navy-100 dark:border-navy-800" aria-label="Project goals" id="goals">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <x-section-heading subtitle="What this agentic AI platform aims to achieve">
                    Project Goals
                </x-section-heading>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($goals as $goal)
                    <div class="text-center p-6 rounded-xl border border-navy-100 dark:border-navy-800 bg-navy-50/50 dark:bg-navy-900/30 hover:border-teal-200 dark:hover:border-teal-700 transition-colors duration-200" data-reveal>
                        <div class="w-12 h-12 mx-auto mb-4 rounded-xl bg-gradient-to-br from-teal-50 to-teal-100 dark:from-teal-900/30 dark:to-teal-800/20 flex items-center justify-center">
                            @if($goal['icon'] === 'search')
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            @elseif($goal['icon'] === 'target')
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            @elseif($goal['icon'] === 'edit')
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            @elseif($goal['icon'] === 'star')
                                <svg class="w-6 h-6 text-teal-600 dark:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                            @endif
                        </div>
                        <h3 class="font-display font-semibold text-navy-900 dark:text-white mb-2">{{ $goal['title'] }}</h3>
                        <p class="text-sm text-navy-500 dark:text-navy-400 leading-relaxed">{{ $goal['desc'] }}</p>
                    </div>
                @empty
                    <div class="col-span-full">
                        <x-status-banner tipe="info">No goals have been defined yet.</x-status-banner>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Idea form --}}
    <section class="py-16 sm:py-20" aria-label="Submit an idea" id="idea-form">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-section-heading subtitle="Have an idea to improve or extend this research? Share it with us.">
                Submit Your Idea
            </x-section-heading>

            {{-- Status banners --}}
            @if(session('success'))
                <div class="mb-6">
                    <x-status-banner tipe="success">{{ session('success') }}</x-status-banner>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6">
                    <x-status-banner tipe="error">
                        Please fix the following errors and try again:
                        <ul class="mt-2 list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </x-status-banner>
                </div>
            @endif

            <form method="POST" action="{{ route('ide-agent.submit') }}" class="space-y-5" novalidate>
                @csrf

                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-navy-700 dark:text-navy-300 mb-1.5">
                        Full Name <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="100"
                           class="w-full px-4 py-2.5 rounded-xl border transition-colors duration-150
                                  {{ $errors->has('name') ? 'border-red-400 dark:border-red-600 bg-red-50/50 dark:bg-red-900/10' : 'border-navy-200 dark:border-navy-700 bg-white dark:bg-surface-dark-raised' }}
                                  text-navy-900 dark:text-white placeholder-navy-400 dark:placeholder-navy-500
                                  focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:focus:border-teal-400 outline-none">
                    @error('name')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-navy-700 dark:text-navy-300 mb-1.5">
                        Email Address <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required maxlength="150"
                           class="w-full px-4 py-2.5 rounded-xl border transition-colors duration-150
                                  {{ $errors->has('email') ? 'border-red-400 dark:border-red-600 bg-red-50/50 dark:bg-red-900/10' : 'border-navy-200 dark:border-navy-700 bg-white dark:bg-surface-dark-raised' }}
                                  text-navy-900 dark:text-white placeholder-navy-400 dark:placeholder-navy-500
                                  focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:focus:border-teal-400 outline-none">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Idea title --}}
                <div>
                    <label for="idea_title" class="block text-sm font-medium text-navy-700 dark:text-navy-300 mb-1.5">
                        Idea Title <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <input type="text" id="idea_title" name="idea_title" value="{{ old('idea_title') }}" required maxlength="200"
                           class="w-full px-4 py-2.5 rounded-xl border transition-colors duration-150
                                  {{ $errors->has('idea_title') ? 'border-red-400 dark:border-red-600 bg-red-50/50 dark:bg-red-900/10' : 'border-navy-200 dark:border-navy-700 bg-white dark:bg-surface-dark-raised' }}
                                  text-navy-900 dark:text-white placeholder-navy-400 dark:placeholder-navy-500
                                  focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:focus:border-teal-400 outline-none">
                    @error('idea_title')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Idea description --}}
                <div>
                    <label for="idea_description" class="block text-sm font-medium text-navy-700 dark:text-navy-300 mb-1.5">
                        Idea Description <span class="text-red-500" aria-hidden="true">*</span>
                    </label>
                    <textarea id="idea_description" name="idea_description" rows="5" required maxlength="2000"
                              class="w-full px-4 py-2.5 rounded-xl border transition-colors duration-150 resize-y
                                     {{ $errors->has('idea_description') ? 'border-red-400 dark:border-red-600 bg-red-50/50 dark:bg-red-900/10' : 'border-navy-200 dark:border-navy-700 bg-white dark:bg-surface-dark-raised' }}
                                     text-navy-900 dark:text-white placeholder-navy-400 dark:placeholder-navy-500
                                     focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:focus:border-teal-400 outline-none">{{ old('idea_description') }}</textarea>
                    @error('idea_description')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Category --}}
                <div>
                    <label for="category" class="block text-sm font-medium text-navy-700 dark:text-navy-300 mb-1.5">
                        Category <span class="text-navy-400 dark:text-navy-500 font-normal">(optional)</span>
                    </label>
                    <select id="category" name="category"
                            class="w-full px-4 py-2.5 rounded-xl border border-navy-200 dark:border-navy-700
                                   bg-white dark:bg-surface-dark-raised text-navy-900 dark:text-white
                                   focus:ring-2 focus:ring-teal-500/20 focus:border-teal-500 dark:focus:border-teal-400 outline-none">
                        <option value="">Select a category...</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Submit --}}
                <div class="pt-2">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-teal-600 hover:bg-teal-500 text-white font-semibold rounded-xl transition-all duration-200 shadow-sm hover:shadow-md hover:-translate-y-0.5 focus:ring-2 focus:ring-teal-500/20 focus:ring-offset-2 dark:focus:ring-offset-surface-dark">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                        Submit Idea
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
