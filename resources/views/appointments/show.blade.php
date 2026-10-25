<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl tex-stone-800 leading-tight">
                {{ __('Appointment details') }}
            </h2>

            <a href="{{ route('appointments.edit', $appointment) }}"
               class="inline-flex items-center px-4 py-2 bg-lime-300 border border-transparent
                      rounded-md font-semibold text-xs tex-stone-700 uppercase tracking-widest
                      hover:bg-lime-200">
                Edit appointment
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex items-center gap-4 mb-4">
                    <h3 class="text-2xl font-semibold tex-stone-800">{{ $appointment->title }}</h3>
                </div>
                
                <div class="space-y-4">
                    
                    @if ($appointment->description)
                        <div>
                            <p class="text-sm tex-stone-500">Description</p>
                            <p class="tex-stone-800">{{ $appointment->description }}</p>
                        </div>
                    @endif

                    <div>
                        <p class="text-sm tex-stone-500">Start date</p>
                        <p class="tex-stone-800">
                            {{ $appointment->start_date_time ? $appointment->start_date_time->format('F jS, Y \a\t H:i') : '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm tex-stone-500">Label</p>
                        <p class="tex-stone-800">
                            {{ $appointment->label ? $appointment->label->name : '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm tex-stone-500">Members</p>
                        <p class="tex-stone-800">
                            {{ $appointment->members->isNotEmpty() ? $appointment->members->pluck('name')->join(', ') : '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm tex-stone-500">Status</p>
                        <p class="tex-stone-800">{{ $appointment->status }}</p>
                    </div>

                    @if ($appointment->is_highlighted)
                        <div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                ★ Highlighted
                            </span>
                        </div>
                    @endif

                </div>
                </div>
            </div>

            <div class="px-6">
                <a href="{{ route('appointments.index') }}"
                   class="text-sm tex-stone-600 hover:tex-stone-900 underline">
                    ← Back to appointments
                </a>
            </div>

        </div>
    </div>
</x-app-layout>

















