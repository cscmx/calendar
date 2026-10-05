<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit label') }}
        </h2>
    </x-slot>



<form method="POST" action="{{ route('labels.update', $label) }}">
    @csrf
    @method('PUT')

    <div>
        <x-input-label for="name" :value="__('name')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $label->name)" required autofocus/>
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <x-primary-button>{{ __('Update') }}</x-primary-button>
    <a href="{{ route('labels.index') }}">{{ __('Cancel') }}</a>


</form>




</x-app-layout>