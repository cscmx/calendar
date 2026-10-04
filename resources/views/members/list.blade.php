<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List members') }}
        </h2>

    <a class="font-semibold text-xs" href="{{ route('members.create') }}">Add member</a>

    </x-slot>

        @php
        $categories = ['personal' => 'Personal', 'family_member' => 'Family member', 'pet' => 'Pet', 'home' => 'Home'];
        @endphp

         <div class="flex flex-wrap gap-4">
        @forelse ($members as $member)

            <a href="{{ route('members.show', $member) }}">
                <div class="mb-5 p-4 border rounded-lg">
                        <p>{{ $member->name}}</p>
                        <p>{{ $member->date_of_birth}}</p>
                        <p>{{ $categories[$member->category]}}</p>
                        <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $member->color }} "></span>
                </div>
            </a>
        @empty
            <p>No member registered yet</p>
        @endforelse
        </div>

</x-app-layout>
