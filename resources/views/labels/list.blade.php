<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List labels') }}
        </h2>

    <a class="font-semibold text-xs" href="{{ route('labels.create') }}">Add label</a>

    </x-slot>

         <div class="flex flex-wrap gap-4">
        @forelse ($labels as $label)

                <div class="mb-5 p-4 border rounded-lg">
                        <p class="font-semibold">{{ $label->name}}</p>
                </div>

        @empty
            <p>No label registered yet</p>
        @endforelse
        </div>

        <a href="{{ route('dashboard') }}">Back to Dashboard</a>
</x-app-layout>
