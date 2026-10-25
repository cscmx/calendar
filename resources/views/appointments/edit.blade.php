
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-stone-800 leading-tight">
            {{ __('Edit appointment') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form method="POST" action="{{ route('appointments.update', $appointment) }}">
                    <div class="space-y-4">    
                        @csrf
                        @method ('PUT')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $appointment->title)" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="3" class="mt-1 block w-full border-stone-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description', $appointment->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        
                        <div>
                            <x-input-label for="start_date_time" :value="__('Start date/time')" />
                            <x-text-input id="start_date_time" name="start_date_time" type="datetime-local" class="mt-1 block w-full" :value="old('start_date_time', $appointment->start_date_time?->format('Y-m-d\TH:i'))"/>
                            <x-input-error class="mt-2" :messages="$errors->get('start_date_time')" />
                        </div>

                        <div>
                            <label for="is_highlighted" class="inline-flex items-center">
                                <input id="is_highlighted" name="is_highlighted" type="checkbox" value="1" {{ old('is_highlighted', $appointment->is_highlighted) ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-stone-600">{{ __('Highlight this appointment') }}</span>
                            </label>
                        </div>

                        <div>
                            <x-input-label for="label_id" :value="__('Label')" />
                            <select id="label_id" name="label_id" class="mt-1 block w-full bg-stone-800 border-stone-600 text-stone-100 focus:border-stone-600 focus:ring-stone-600 rounded-md shadow-sm" required>
                                @foreach ($labels as $label)
                                    <option value="{{ $label->id }}" @selected(old('label_id', $appointment->label_id) == $label->id)>
                                        {{ $label->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('label_id')" />
                        </div>

                        <div>
                            <label for="members"> Members </label>
                            <select name="members[]" id="members" multiple class="mt-1 block w-full">
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}"
                                    @selected(in_array($member->id, old('members', $appointment->members->pluck('id')->all())))>{{ $member->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        @error('members')
                            <p class="text-red-500 text-sm">{{ $message}}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <a href="{{ route('appointments.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-stone-300 rounded-md font-semibold text-xs text-stone-700 uppercase tracking-widest hover:bg-stone-50"> Cancel </a>
                        <x-danger-button form="delete-button" onclick="return confirm('Are you sure you want to delete this appointment?')">{{ __('Delete') }}</x-danger-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('appointments.destroy', $appointment) }}" class="hidden" id="delete-button">
                    @csrf 
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

