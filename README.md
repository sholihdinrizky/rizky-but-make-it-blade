# AgentCareer — Personalized Agentic AI Portfolio

A personal academic portfolio website showcasing research on **Personalized Agentic AI for Intelligent Job Discovery and Application Preparation** — an AI career agent that analyzes user profiles, discovers relevant job opportunities, and tailors application materials.

## Features

- **Three-page portfolio**: Home (with interactive 3D hero), Profile, and Research Ideas
- **7-stage agent pipeline visualization**: From profile intake to application kit delivery
- **Idea submission form**: Server-side validated with per-field error messages
- **Dark mode**: URL parameter-driven (`?mode=dark`) with full design parity
- **3D career-matching network**: Three.js scene with ambient rotation, mouse parallax, and performance optimizations
- **Responsive design**: Tested from 320px to 1920px with mobile hamburger menu
- **Zero CDN dependencies**: All fonts, CSS, and JS bundled via Vite

## Tech Stack

- Laravel 13 (PHP 8.5)
- Blade templating with custom components
- Tailwind CSS v4 with `@tailwindcss/vite`
- Vite 8 for asset bundling
- Three.js for 3D visualization
- Inter + Space Grotesk fonts via @fontsource

## Getting Started

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Development (with hot-reload)
npm run dev
php artisan serve

# Production build
npm run build
php artisan serve
```

## Project Structure

```
app/Http/Controllers/PageController.php  — Single controller for all pages
routes/web.php                           — Route definitions
resources/views/layouts/app.blade.php    — Master layout
resources/views/partials/               — Navbar and footer
resources/views/components/             — Blade components (info-card, status-banner, etc.)
resources/views/beranda.blade.php       — Home page
resources/views/profil.blade.php        — Profile page
resources/views/ide-agent.blade.php     — Research Ideas page
resources/js/scene.js                   — Three.js career-matching network
resources/css/app.css                   — Design system and Tailwind config
```

## Author

**Muhammad Sholihuddin Rizky** — 5025241171  
Informatics Engineering, Institut Teknologi Sepuluh Nopember (ITS)
