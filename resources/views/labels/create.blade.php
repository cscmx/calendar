<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create label') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('labels.store') }}" class="mt-6 space-y-6">
            @csrf

        <div>
            <x-input-label for="name" :value="__('name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>

    </form>

</x-app-layout>

