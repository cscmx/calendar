
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit appointment') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('appointments.update', $appointment) }}" class="mt-6 space-y-6">
        @csrf
        @method ('PUT')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $appointment->title)" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $appointment->description)" required autocomplete="description" />
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>
        
        
        <div>
            <x-input-label for="start_date_time" :value="__('Start date/time')" />
            <x-text-input id="start_date_time" name="start_date_time" type="datetime-local" class="mt-1 block w-full" :value="old('start_date_time', $appointment->start_date_time)"/>
            <x-input-error class="mt-2" :messages="$errors->get('start_date_time')" />
        </div>

        <div>
            <label for="is_highlighted" class="inline-flex items-center">
                <input id="is_highlighted" name="is_highlighted" type="checkbox" value="1" {{ old('is_highlighted', $appointment->is_highlighted) ? 'checked' : '' }}>
                <span class="ms-2 text-sm text-gray-600">{{ __('Highlight this appointment') }}</span>
            </label>
        </div>

         <x-select id="label_id" name="label_id" class="mt-1 block w-full" :selected="old('label_id', $appointment->label_id)" :options="$labels" required/>
         <x-input-error class="mt-2" :messages="$errors->get('label_id')" />


        <label for="members"> Members </label>
        <select name="members[]" id="members" multiple class="mt-1 block w-full">
            @foreach ($members as $member)
            <option value="{{ $member->id }}"
                @selected(in_array($member->id, old('members', $appointment->members->pluck('id')->all())))>{{ $member->name }}
            </option>
            @endforeach
        </select>

        @error('members')
            <p class="text-red-500 text-sm">{{ $message}}</p>
        @enderror

        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <a href="{{ route('appointments.index') }}">{{ __('Cancel') }}</a>
        <x-danger-button form="delete-button" onclick="return confirm('Are you sure you want to delete this appointment?')">{{ __('Delete') }}</x-danger-button>

    </form>

    <form method="POST" action="{{ route('appointments.destroy', $appointment) }}" class="hidden" id="delete-button">
        @csrf 
        @method('DELETE')
    </form>

</x-app-layout>

