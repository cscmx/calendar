@props(['disabled' => false, 'options' => [], 'selected' => null])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-stone-300 dark:border-stone-700 dark:bg-stone-900 dark:text-stone-300 focus:border-stone-500 dark:focus:border-stone-600 focus:ring-stone-500 dark:focus:ring-stone-600 rounded-md shadow-sm']) !!}>

@foreach($options as $value => $label)<option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>{{ $label }}</option>	@endforeach

</select>

