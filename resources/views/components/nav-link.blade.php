@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative z-50 inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-bold text-stone-700 bg-white transition-all duration-150'
            : 'relative z-50 inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium text-stone-600 hover:text-black transition-all duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
