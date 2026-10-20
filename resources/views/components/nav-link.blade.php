@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-bold text-gray-900 bg-white transition-all duration-150'
            : 'inline-flex items-center justify-center px-4 py-2 rounded-lg text-sm font-medium text-stone-600 hover:text-white transition-all duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
