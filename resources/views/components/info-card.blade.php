@props([
    'variant' => 'default',
])

@php
    $baseClasses = 'rounded-xl border transition-shadow duration-200';
    $variantClasses = match($variant) {
        'elevated' => 'bg-white dark:bg-surface-dark-raised border-navy-200/60 dark:border-navy-700/60 shadow-sm hover:shadow-md',
        'outlined' => 'bg-transparent border-navy-200 dark:border-navy-700',
        default => 'bg-white dark:bg-surface-dark-raised border-navy-100 dark:border-navy-800 shadow-sm',
    };
@endphp

<div {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}>
    @isset($header)
        <div class="px-5 py-4 border-b border-navy-100 dark:border-navy-800">
            {{ $header }}
        </div>
    @endisset

    <div class="px-5 py-5">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="px-5 py-3 border-t border-navy-100 dark:border-navy-800 bg-navy-50/50 dark:bg-navy-900/30 rounded-b-xl">
            {{ $footer }}
        </div>
    @endisset
</div>
