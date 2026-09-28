<nav class="site-sidebar lg:fixed lg:inset-y-0 lg:left-0 lg:w-64 lg:flex lg:flex-col lg:h-svh bg-transparent text-[#e8e6e3] z-50">
    {{-- Mobile Top Bar --}}
    <div class="lg:hidden flex items-center justify-between px-4 py-3 bg-[var(--color-charcoal)]/90 backdrop-blur-md sticky top-0 z-50 border-b border-white/10">
        <a href="{{ $nav['beranda'] ?? '/' }}" class="font-display font-bold text-lg text-white flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-[var(--color-orange)] flex items-center justify-center text-white text-sm">R</div>
            Rizky <span class="text-xs font-normal text-[var(--color-muted-light)] bg-white/10 px-2 py-0.5 rounded-full">portfolio</span>
        </a>
        <button type="button" id="mobile-menu-btn" class="p-2 -mr-2 text-white/70 hover:text-white" aria-expanded="false" aria-controls="mobile-menu">
            <svg class="w-6 h-6 hamburger-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            <svg class="w-6 h-6 close-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Mobile Menu Drawer & Desktop Sidebar Content --}}
    <div id="mobile-menu" class="hidden lg:flex flex-col flex-1 h-full px-4 lg:px-6 py-6 lg:py-8 bg-[var(--color-charcoal)] lg:bg-transparent absolute lg:static top-full left-0 right-0 border-b border-white/10 lg:border-none shadow-xl lg:shadow-none">
        
        {{-- Desktop Logo --}}
        <a href="{{ $nav['beranda'] ?? '/' }}" class="hidden lg:flex items-center gap-3 font-display font-bold text-xl text-white mb-10 group">
            <div class="w-10 h-10 rounded-full bg-[var(--color-orange)] flex items-center justify-center text-white shadow-lg shadow-[var(--color-orange)]/20 transition-transform group-hover:scale-105">R</div>
            <div class="flex flex-col leading-tight">
                <span>Rizky</span>
                <span class="text-[10px] uppercase tracking-wider text-[var(--color-orange)] font-semibold mt-0.5">Portfolio</span>
            </div>
        </a>

        {{-- Navigation Links --}}
        <div class="flex flex-col gap-2 mb-8">
            <a href="{{ $nav['beranda'] ?? '/' }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ $aktif === 'beranda' ? 'bg-[var(--color-panel-light)]/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                <svg class="w-5 h-5 {{ $aktif === 'beranda' ? 'text-[var(--color-orange)]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Home
            </a>
            <a href="{{ $nav['profil'] ?? '/profil-mahasiswa' }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ $aktif === 'profil' ? 'bg-[var(--color-panel-light)]/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                <svg class="w-5 h-5 {{ $aktif === 'profil' ? 'text-[var(--color-orange)]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Profile
            </a>
            <a href="{{ $nav['ideAgent'] ?? '/ide-agent' }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all {{ $aktif === 'ide-agent' ? 'bg-[var(--color-panel-light)]/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5' }}">
                <svg class="w-5 h-5 {{ $aktif === 'ide-agent' ? 'text-[var(--color-orange)]' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Research Ideas
            </a>
        </div>

        {{-- 7 Stages list (Replacing "Recent Messages" from reference) --}}
        <div class="mb-auto">
            <p class="text-xs font-semibold text-white/40 uppercase tracking-wider mb-3 px-3">Pipeline Stages</p>
            <ul class="flex flex-col gap-1">
                @php
                    $stages = ['Profile Intake', 'Skill Parsing', 'Job Discovery', 'Matching & Scoring', 'Resume Tailoring', 'Cover Letter Gen', 'Final Review'];
                @endphp
                @foreach($stages as $index => $stage)
                    <li>
                        <a href="{{ $nav['ideAgent'] ?? '/ide-agent' }}#pipeline" class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs text-white/60 hover:text-white hover:bg-white/5 transition-colors">
                            <span class="w-4 h-4 rounded-full bg-white/10 flex items-center justify-center text-[10px]">{{ $index + 1 }}</span>
                            {{ $stage }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Bottom Actions --}}
        <div class="mt-8 pt-6 border-t border-white/10 flex flex-col gap-4">
            {{-- Theme Toggle --}}
            <a href="{{ $theme['toggleUrl'] ?? '?mode=dark' }}" class="flex items-center justify-between px-3 py-2 rounded-xl text-sm font-medium text-white/60 hover:text-white hover:bg-white/5 transition-colors">
                <span class="flex items-center gap-3">
                    @if($theme['isDark'] ?? false)
                        <svg class="w-5 h-5 text-[var(--color-orange)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Light Mode
                    @else
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        Dark Mode
                    @endif
                </span>
            </a>

            {{-- User Chip --}}
            <a href="{{ $nav['profil'] ?? '/profil-mahasiswa' }}" class="flex items-center gap-3 p-2 rounded-xl bg-white/5 hover:bg-white/10 transition-colors">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-white/20 to-white/5 flex items-center justify-center text-white font-bold border border-white/10">MR</div>
                <div class="flex flex-col">
                    <span class="text-sm font-semibold text-white">Rizky</span>
                    <span class="text-xs text-white/50">Informatics, ITS</span>
                </div>
            </a>
        </div>
    </div>
</nav>
