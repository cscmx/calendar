<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Member details') }}
            </h2>

            <a href="{{ route('members.edit', $member) }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest
                      hover:bg-gray-700">
                Edit member
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">

        @php
        $categories = ['personal' => 'Personal', 'family_member' => 'Family member', 'pet' => 'Pet', 'home' => 'Home'];
        @endphp

            <a href="{{ route('members.edit', $member) }}" class="block bg-white shadow-sm rounded-lg p-6 hover:bg-gray-50 transition">
                <div class="flex items-center gap-4 mb-4">
                    <span class="inline-block w-12 h-12 rounded-full border border-gray-200" style="background-color: {{ $member->color }}"></span>
                    <p class="text-2xl font-semibold text-gray-800">{{ $member->name }}</p>
                </div>
                
                <p class="text-sm text-gray-500">Date of birth</p>
                <p class="text-gray-800">
                    {{ $member->date_of_birth ? $member->date_of_birth->format('F jS, Y') : '—' }}
                </p>
                
                <p class="text-sm text-gray-500 mt-2">Category</p>
                <p class="text-gray-800">{{ $categories[$member->category] }}</p>
            </a>

            <div>
                <a href="{{ route('members.index') }}"
                   class="text-sm text-gray-600 hover:text-gray-900 underline">
                    ← Back to members
                </a>
            </div>

        </div>
    </div>
</x-app-layout>


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
        
        <div class="flex flex-wrap gap-2 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs hover:bg-neutral-secondary-medium">
                <p>{{ $member->name}}</p>
                <p>{{ $member->date_of_birth}}</p>
                <p>{{ $categories[$member->category]}}</p>
                <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $member->color }}"></span>
        </div>

        <a href="{{ route('members.index') }}">{{ __('Back to index') }}</a>
        <x-danger-button form="delete-button" onclick="return confirm('Are you sure you want to delete this member?')">{{ __('Delete') }}</x-danger-button>

        <form method="POST" action="{{ route('members.destroy', $member) }}" class="hidden" id="delete-button">
            @csrf 
            @method('DELETE')
        </form>
 


</x-app-layout>
