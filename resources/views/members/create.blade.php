<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create member') }}
        </h2>
    </x-slot>

    <form method="post" action="{{ route('members.store') }}" class="mt-6 space-y-6">
            @csrf

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
        
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <a href="{{ route('members.index') }}">{{ __('Cancel') }}</a>

    </form>

</x-app-layout>

