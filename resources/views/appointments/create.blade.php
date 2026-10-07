<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create appointment') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('appointments.store') }}" class="mt-6 space-y-6">
    @csrf

        <div>
            <x-input-label for="name" :value="__('name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description')" required autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        
        
        <div>
            <x-input-label for="start_date_time" :value="__('Start date/time')" />
            <x-text-input id="start_date_time" name="start_date_time" type="date" class="mt-1 block w-full" :value="old('start_date_time')" autocomplete="bday" />
            <x-input-error class="mt-2" :messages="$errors->get('start_date_time')" />
        </div>

        <div>
            <label for="is_highlighted" class="inline-flex items-center">
                <input id="is_highlighted" name="is_highlighted" type="checkbox" value="1" {{ old('is_highlighted') ? 'checked' : '' }}>
                <span class="ms-2 text-sm text-gray-600">{{ __('Highlight this appointment') }}</span>
            </label>
        </div>
        

        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>

    </form>

</x-app-layout>

