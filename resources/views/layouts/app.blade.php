<!DOCTYPE html>
<html lang="en" class="{{ $theme['isDark'] ?? false ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Personalized Agentic AI for Intelligent Job Discovery and Application Preparation — an academic research portfolio by Muhammad Sholihuddin Rizky.">
    <title>@yield('title', 'Rizky Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[var(--color-charcoal)] text-text-light dark:text-text-dark font-sans antialiased transition-colors duration-200 relative">
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <div class="flex flex-col lg:flex-row min-h-screen relative z-10">
        {{-- Sidebar/Navbar included from partials --}}
        @include('partials.navbar', [
            'aktif' => $aktif ?? 'beranda',
            'nav' => $nav ?? [],
            'theme' => $theme ?? ['isDark' => false, 'toggleUrl' => '?mode=dark'],
        ])

        {{-- Main Content Area --}}
        <div class="flex-1 flex flex-col p-2 sm:p-4 lg:p-6 lg:ml-64 w-full max-w-full">
            {{-- The Panel --}}
            <main id="main-content" role="main" class="flex-1 bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] text-[var(--color-text-light)] dark:text-[var(--color-text-dark)] rounded-3xl shadow-xl min-h-[calc(100vh-1rem)] lg:min-h-[calc(100vh-3rem)] overflow-hidden relative">
                @yield('content')
                
                @include('partials.footer')
            </main>
        </div>
    </div>
</body>
</html>
