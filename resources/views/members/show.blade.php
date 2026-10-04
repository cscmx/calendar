<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member details') }}
        </h2>

        <a class="font-semibold text-xs" href="{{ route('members.edit', $member) }}">Edit member</a>

    
    </x-slot>

        @php
        $categories = ['personal' => 'Personal', 'family_member' => 'Family member', 'pet' => 'Pet', 'home' => 'Home'];
        @endphp
        
        <div class="flex flex-wrap gap-4 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
                <p>{{ $member->name}}</p>
                <p>{{ $member->date_of_birth}}</p>
                <p>{{ $categories[$member->category]}}</p>
                <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $member->color }}"></span>
        </div>

        <x-danger-button form="delete-button">{{ __('Delete') }}</x-danger-button>
        <a href="{{ route('members.index') }}">{{ __('Back to index') }}</a> 


        <form method="POST" action="{{ route('members.destroy', $member) }}" class="hidden" id="delete-button">
            @csrf 
            @method('DELETE')
        </form>
 


</x-app-layout>
