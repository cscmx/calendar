<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit member') }}
        </h2>
    </x-slot>



<form method="POST" action="{{ route('members.update', $member) }}">
    @csrf
    @method('PUT')

     <div>
            <x-input-label for="name" :value="__('name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $member->name)" required autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        @php
            $categories = ['personal' => 'Personal', 'family_member' => 'Family member', 'pet' => 'Pet', 'home' => 'Home'];
        @endphp

        <div>
            <x-input-label for="category" :value="__('category')" />
            <x-select id="category" name="category" class="mt-1 block w-full" :selected="old('category', $member->category)" :options="$categories" required/>

            <x-input-error class="mt-2" :messages="$errors->get('category')" />

        </div>

        <div>
            <x-input-label for="date_of_birth" :value="__('date_of_birth')" />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="mt-1 block w-full" :value="old('date_of_birth', $member->date_of_birth)"/>
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>


        @php
            $colors = ['#ABDEE6' => 'Azul claro', '#CBAACB' => 'Lila', '#FFFFB5' => 'Amarillo claro', '#FFCCB6' => 'Naranja claro', '#F3B0C3' => 'Rosa claro'];
        @endphp

        <div>
            <x-input-label for="color" :value="__('color')" />
            <x-select id="color" name="color" class="mt-1 block w-full" :selected="old('color', $member->color)" :options="$colors" required/>

            <x-input-error class="mt-2" :messages="$errors->get('color')" />

        </div>

    <x-primary-button>{{ __('Update') }}</x-primary-button>
    <a href="{{ route('members.show', $member) }}">{{ __('Cancel') }}</a>
    <x-danger-button form="delete-button">{{ __('Delete') }}</x-danger-button>

</form>


<form method="POST" action="{{ route('members.destroy', $member) }}" class="hidden" id="delete-button">
    @csrf 
    @method('DELETE')
</form>

</x-app-layout>