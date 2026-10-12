<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments list') }}
        </h2>

    <a class="font-semibold text-xs" href="{{ route('appointments.create') }}"> Add appointment </a>
    
    </x-slot>
        
         <div class="flex flex-wrap gap-4">
        @forelse ($appointments as $appointment)
            <a href="{{ route('appointments.edit', $appointment) }}"> 
                <div class="mb-5 p-4 border rounded-lg">
                        <p class="font-semibold">{{ $appointment->title}}</p>
                </div>
            </a> 
        @empty
            <p>No appointment registered yet</p>
        @endforelse
        </div>
        

        <a href="{{ route('dashboard') }}"> Back to Dashboard </a>
</x-app-layout>