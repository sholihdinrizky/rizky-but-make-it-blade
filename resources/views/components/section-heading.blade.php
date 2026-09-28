@props([
    'subtitle' => null,
])

<div {{ $attributes->merge(['class' => 'mb-10']) }}>
    <h2 class="font-display font-bold text-2xl sm:text-3xl text-navy-900 dark:text-white">
        {{ $slot }}
    </h2>
    @if($subtitle)
        <p class="mt-2 text-navy-500 dark:text-navy-400 max-w-2xl">{{ $subtitle }}</p>
    @endif
    <div class="mt-3 h-1 w-16 rounded-full bg-gradient-to-r from-teal-500 to-teal-300"></div>
</div>
