<!DOCTYPE html>
<html lang="en" class="{{ $theme['isDark'] ?? false ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="description" content="Personalized Agentic AI for Intelligent Job Discovery and Application Preparation — an academic research portfolio by Muhammad Sholihuddin Rizky.">
    <title>@yield('title', 'AgentCareer') — Personalized Career AI</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-navy-50 text-navy-900 font-sans antialiased dark:bg-surface-dark dark:text-navy-100 transition-colors duration-200">
    <a href="#main-content" class="skip-link">Skip to main content</a>

    @include('partials.navbar', [
        'aktif' => $aktif ?? 'beranda',
        'nav' => $nav ?? [],
        'theme' => $theme ?? ['isDark' => false, 'toggleUrl' => '?mode=dark'],
    ])

    <main id="main-content" role="main">
        @yield('content')
    </main>

    @include('partials.footer')
</body>
</html>
