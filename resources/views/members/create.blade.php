<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create member') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow-sm rounded-lg p-6">
                <form method="POST" action="{{ route('members.store') }}">
                    @csrf

                    <div class="space-y-4">
                        <div>
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        @php
                            $categories = ['personal' => 'Personal', 'family_member' => 'Family member', 'pet' => 'Pet', 'home' => 'Home'];
                        @endphp
                        <div>
                            <x-input-label for="category" :value="__('category')" />
                            <x-select id="category" name="category" class="mt-1 block w-full" :selected="old('category')" :options="$categories" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        <div>
                            <x-input-label for="date_of_birth" :value="__('date_of_birth')" />
                            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth')" autocomplete="bday" />
                            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                        </div>

                        @php
                            $colors = ['#ABDEE6' => 'Azul claro', '#CBAACB' => 'Lila', '#FFFFB5' => 'Amarillo claro', '#FFCCB6' => 'Naranja claro', '#F3B0C3' => 'Rosa claro'];
                        @endphp
                        <div>
                            <x-input-label for="color" :value="__('color')" />
                            <x-select id="color" name="color" class="mt-1 block w-full" :selected="old('color')" :options="$colors" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('color')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        <a href="{{ route('members.index') }}"
                           class="text-sm text-gray-600 hover:text-gray-900 underline">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>