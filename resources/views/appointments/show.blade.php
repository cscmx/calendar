<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment details') }}
        </h2>

        <a class="font-semibold text-xs" href="{{ route('appointments.edit', $appointment) }}">Edit appointment</a>

    
    </x-slot>
        
        <div class="flex flex-wrap gap-4 box-content size-128 border-6 p-6 bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-s hover:bg-neutral-secondary-medium">
                <strong class="text-2xl font-bold">{{ $appointment->title}}</strong>
                <P>Description: {{ $appointment->description}}</P>
                <p>Label: {{ $appointment->label->name }}</p>
                <p>Start at: {{ $appointment->start_date_time}}</p>
                <p>Member/s: {{ $appointment->members->pluck('name')->join(', ') }}</p>
                <p>Highlighted: {{ $appointment->is_highlighted ? 'Yes' : 'No' }}</p>
                <p>Status: {{ $appointment->status}}</p>

        </div>

        <a href="{{ route('appointments.index') }}">{{ __('Back to index') }}</a> 

</x-app-layout>
