<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create appointment') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm rounded-lg p-6">

                <form method="POST" action="{{ route('appointments.store') }}">
                    <div class="space-y-4">    
                    @csrf

                        <div>
                            <x-input-label for="title" :value="__('title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('description')" />
                            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required>{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        
                        <div>
                            <x-input-label for="start_date_time" :value="__('Start date/time')" />
                            <x-text-input id="start_date_time" name="start_date_time" type="datetime-local" class="mt-1 block w-full" :value="old('start_date_time')" autocomplete="bday" />
                            <x-input-error class="mt-2" :messages="$errors->get('start_date_time')" />
                        </div>

                        <div>
                            <label for="is_highlighted" class="inline-flex items-center">
                                <input id="is_highlighted" name="is_highlighted" type="checkbox" value="1" {{ old('is_highlighted') ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('Highlight this appointment') }}</span>
                            </label>
                        </div>

                        <div>
                            <x-input-label for="label" :value="__('Label')" />
                            <x-select id="label_id" name="label_id" class="mt-1 block w-full" :selected="old('label_id')" :options="$labels" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('label_id')" />
                        </div>

                        <div>
                            <label for="members"> Members </label>
                                <select name="members[]" id="members" multiple class="mt-1 block w-full">
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}"
                                        @selected(in_array($member->id, old('members', [])))>{{ $member->name }}
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
                        <a href="{{ route('labels.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                            Cancel
                        </a>
                </div>

                </form>
            </div>
        </div>
    </div>

            </x-app-layout>

