<nav class="site-navbar sticky top-0 z-50 backdrop-blur-lg bg-white/80 dark:bg-navy-950/80 border-b border-navy-200/50 dark:border-navy-700/50" aria-label="Main navigation">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ $nav['beranda'] ?? '/' }}" class="flex items-center gap-2 font-display font-bold text-xl text-navy-900 dark:text-white hover:text-teal-600 dark:hover:text-teal-400 transition-colors">
                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-teal-500 to-teal-700 flex items-center justify-center text-white text-sm font-bold">A</span>
                <span>AgentCareer</span>
            </a>

            {{-- Desktop links --}}
            <div class="hidden md:flex items-center gap-1">
                <a href="{{ $nav['beranda'] ?? '/' }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $aktif === 'beranda' ? 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-300' : 'text-navy-600 hover:bg-navy-100 dark:text-navy-300 dark:hover:bg-navy-800' }}">
                    Home
                </a>
                <a href="{{ $nav['profil'] ?? '/profil-mahasiswa' }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $aktif === 'profil' ? 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-300' : 'text-navy-600 hover:bg-navy-100 dark:text-navy-300 dark:hover:bg-navy-800' }}">
                    Profile
                </a>
                <a href="{{ $nav['ideAgent'] ?? '/ide-agent' }}"
                   class="px-4 py-2 rounded-lg text-sm font-medium transition-colors {{ $aktif === 'ide-agent' ? 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-300' : 'text-navy-600 hover:bg-navy-100 dark:text-navy-300 dark:hover:bg-navy-800' }}">
                    Research Ideas
                </a>
            </div>

            <div class="flex items-center gap-2">
                {{-- Dark mode toggle --}}
                <a href="{{ $theme['toggleUrl'] ?? '?mode=dark' }}"
                   class="p-2 rounded-lg text-navy-500 hover:bg-navy-100 dark:text-navy-400 dark:hover:bg-navy-800 transition-colors"
                   aria-label="Toggle {{ ($theme['isDark'] ?? false) ? 'light' : 'dark' }} mode"
                   title="{{ ($theme['isDark'] ?? false) ? 'Switch to light mode' : 'Switch to dark mode' }}">
                    @if($theme['isDark'] ?? false)
                        {{-- Sun icon --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    @else
                        {{-- Moon icon --}}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                    @endif
                </a>

                {{-- Mobile menu button --}}
                <button type="button"
                        class="md:hidden p-2 rounded-lg text-navy-500 hover:bg-navy-100 dark:text-navy-400 dark:hover:bg-navy-800 transition-colors"
                        id="mobile-menu-btn"
                        aria-expanded="false"
                        aria-controls="mobile-menu"
                        aria-label="Open navigation menu">
                    <svg class="w-6 h-6 hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="w-6 h-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div class="md:hidden hidden" id="mobile-menu" role="menu">
        <div class="px-4 pb-4 pt-2 space-y-1 border-t border-navy-200/50 dark:border-navy-700/50">
            <a href="{{ $nav['beranda'] ?? '/' }}" role="menuitem"
               class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ $aktif === 'beranda' ? 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-300' : 'text-navy-600 hover:bg-navy-100 dark:text-navy-300 dark:hover:bg-navy-800' }}">
                Home
            </a>
            <a href="{{ $nav['profil'] ?? '/profil-mahasiswa' }}" role="menuitem"
               class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ $aktif === 'profil' ? 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-300' : 'text-navy-600 hover:bg-navy-100 dark:text-navy-300 dark:hover:bg-navy-800' }}">
                Profile
            </a>
            <a href="{{ $nav['ideAgent'] ?? '/ide-agent' }}" role="menuitem"
               class="block px-4 py-2.5 rounded-lg text-sm font-medium transition-colors {{ $aktif === 'ide-agent' ? 'bg-teal-50 text-teal-700 dark:bg-teal-900/30 dark:text-teal-300' : 'text-navy-600 hover:bg-navy-100 dark:text-navy-300 dark:hover:bg-navy-800' }}">
                Research Ideas
            </a>
        </div>
    </div>
</nav>
