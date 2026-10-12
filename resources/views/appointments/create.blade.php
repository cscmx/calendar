<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create appointment') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('appointments.store') }}" class="mt-6 space-y-6">
    @csrf

        <div>
            <x-input-label for="title" :value="__('title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
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

         <x-select id="label_id" name="label_id" class="mt-1 block w-full" :selected="old('label_id')" :options="$labels" required/>
         <x-input-error class="mt-2" :messages="$errors->get('label_id')" />


        <label for="members"> Members </label>
        <select name="members[]" id="members" multiple class="mt-1 block w-full">
            @foreach ($members as $member)
            <option value="{{ $member->id }}"
                @selected(in_array($member->id, old('members', [])))>{{ $member->name }}
            </option>
            @endforeach
        </select>

        @error('members')
            <p class="text-red-500 text-sm">{{ $message}}</p>
        @enderror

        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <a href="{{ route('dashboard') }}">{{ __('Cancel') }}</a>

    </form>

</x-app-layout>

