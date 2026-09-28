@props([
    'variant' => 'default',
])

@php
    $baseClasses = 'relative w-full h-full min-h-[160px] rounded-3xl transition-all duration-700 preserve-3d group-hover:rotate-y-180 group-focus-visible:rotate-y-180 group-focus-within:rotate-y-180 shadow-sm hover:shadow-lg';
@endphp

<div class="group perspective-1000 w-full h-full" tabindex="0" onclick="this.setAttribute('aria-pressed', this.getAttribute('aria-pressed') === 'true' ? 'false' : 'true'); this.classList.toggle('rotate-y-180-force')">
    <div class="{{ $baseClasses }} [@media(prefers-reduced-motion:reduce)]:transition-opacity [@media(prefers-reduced-motion:reduce)]:group-hover:rotate-y-0">
        {{-- Front Face --}}
        <div class="absolute inset-0 w-full h-full backface-hidden rounded-3xl bg-[var(--color-pill-light)] dark:bg-[var(--color-pill-dark)] p-6 border border-black/5 dark:border-white/5 flex flex-col [@media(prefers-reduced-motion:reduce)]:group-hover:opacity-0 [@media(prefers-reduced-motion:reduce)]:group-focus-within:opacity-0 transition-opacity duration-500">
            @isset($header)
                <div class="mb-4 text-[var(--color-orange)] flex items-center justify-between">
                    {{ $header }}
                    <span class="text-xs font-semibold bg-[var(--color-panel-light)] dark:bg-[var(--color-panel-dark)] px-2 py-1 rounded-full text-[var(--color-muted-light)] dark:text-[var(--color-muted-dark)]">...</span>
                </div>
            @endisset
            <div class="font-display font-medium text-lg leading-tight mt-auto">
                {{ $slot }}
            </div>
        </div>

        {{-- Back Face --}}
        <div class="absolute inset-0 w-full h-full backface-hidden rounded-3xl bg-[var(--color-orange)] text-white p-6 rotate-y-180 flex flex-col justify-center items-center text-center [@media(prefers-reduced-motion:reduce)]:rotate-y-0 [@media(prefers-reduced-motion:reduce)]:opacity-0 [@media(prefers-reduced-motion:reduce)]:group-hover:opacity-100 [@media(prefers-reduced-motion:reduce)]:group-focus-within:opacity-100 transition-opacity duration-500">
            <div class="text-sm leading-relaxed overflow-y-auto">
                {{ $back ?? $slot }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Mobile tap fallback */
    .group.rotate-y-180-force > div {
        transform: rotateY(180deg);
    }
    @media (prefers-reduced-motion: reduce) {
        .group.rotate-y-180-force > div {
            transform: none;
        }
        .group.rotate-y-180-force > div > div:first-child {
            opacity: 0;
        }
        .group.rotate-y-180-force > div > div:last-child {
            opacity: 1;
        }
    }
</style>
