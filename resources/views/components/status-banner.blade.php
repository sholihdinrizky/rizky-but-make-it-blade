@props([
    'tipe' => 'info',
])

@php
    $styles = match($tipe) {
        'success' => 'bg-teal-50 border-teal-300 text-teal-800 dark:bg-teal-900/20 dark:border-teal-700 dark:text-teal-200',
        'error' => 'bg-red-50 border-red-300 text-red-800 dark:bg-red-900/20 dark:border-red-700 dark:text-red-200',
        'warning' => 'bg-amber-50 border-amber-300 text-amber-800 dark:bg-amber-900/20 dark:border-amber-700 dark:text-amber-200',
        default => 'bg-blue-50 border-blue-300 text-blue-800 dark:bg-blue-900/20 dark:border-blue-700 dark:text-blue-200',
    };
    $roleAttr = in_array($tipe, ['error', 'warning']) ? 'alert' : 'status';
    $iconMap = match($tipe) {
        'success' => 'M5 13l4 4L19 7',
        'error' => 'M6 18L18 6M6 6l12 12',
        'warning' => 'M12 9v2m0 4h.01M12 2l10 18H2L12 2z',
        default => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
    };
@endphp

<div {{ $attributes->merge(['class' => "flex items-start gap-3 px-4 py-3 rounded-lg border $styles"]) }}
     role="{{ $roleAttr }}">
    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconMap }}"/>
    </svg>
    <div class="text-sm font-medium">
        {{ $slot }}
    </div>
</div>
