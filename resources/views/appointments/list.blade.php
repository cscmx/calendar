<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment details') }}
        </h2>

    <a class="font-semibold text-xs" href="{{ route('appointments.create') }}"> Add appointment </a>
    
    </x-slot>

    <form method="GET" action="{{ route('appointments.index') }}">
        <select name="member">
            <option value=""> All members </option>
            @foreach ($members as $member)
                <option value="{{ $member->id }}" @selected(request('member') == $member->id)>{{ $member->name}}</option>
            @endforeach
        </select>
        <x-primary-button>{{ __('Filter') }}</x-primary-button>
    </form>

         <div class="flex flex-wrap gap-4">
        @forelse ($appointments as $appointment)
            <a href="{{ route('appointments.show', $appointment) }}"> 
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