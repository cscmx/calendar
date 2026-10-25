@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-stone-300 focus:border-stone-500 focus:ring-stone-500 rounded-md shadow-sm']) }}>
