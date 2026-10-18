<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Appointment details') }}
            </h2>

            <a href="{{ route('appointments.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent 
                      rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                      hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 
                      focus:ring-offset-2 transition ease-in-out duration-150">
                Add appointment
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" action="{{ route('appointments.index') }}" class="flex flex-wrap items-end gap-4">

                    <nav class="flex gap-2 mb-4">
                        <a href="{{ route('appointments.index', ['filter' => 'today']) }}" 
                            class="px-3 py-1 text-sm rounded-md border {{ request('filter') === 'today' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                                Today
                        </a>
                        <a href="{{ route('appointments.index', ['filter' => 'week']) }}"
                            class="px-3 py-1 text-sm rounded-md border 
                                    {{ request('filter') === 'week' ? 'bg-gray-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                                This week
                        </a>
                        <a href="{{ route('appointments.index') }}"
                            class="px-3 py-1 text-sm rounded-md border 
                                    {{ !request('filter') ? 'bg-gray-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                                All
                        </a>
                    </nav>

                    {{--**************MIRAR SI TE CONSERVA ESTE CONTENEDOR******--}}
                    <div class="flex flex-col sm:flex-row gap-4 w-full">
                        <div class="flex flex-col">
                            <label for="label" class="mb-1 text-sm font-medium text-gray-700">
                                Label
                            </label>
                            <select name="label" id="label"
                                    class="border-gray-300 rounded-md shadow-sm 
                                        focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">All labels</option>
                                @foreach ($labels as $label)
                                    <option value="{{ $label->id }}" @selected(request('label') == $label->id)>
                                        {{ $label->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label for="member" class="mb-1 text-sm font-medium text-gray-700">
                                Member
                            </label>
                            <select name="member" id="member"
                                    class="border-gray-300 rounded-md shadow-sm 
                                        focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">All members</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}" @selected(request('member') == $member->id)>
                                        {{ $member->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                </div>

                    <x-primary-button>{{ __('Filter') }}</x-primary-button>

                    @if (request('label') || request('member'))
                        <a href="{{ route('appointments.index') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">Clear filters</a>
                    @endif
                </form>
            </section>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @forelse ($appointments as $appointment)
                    <a href="{{ route('appointments.show', $appointment) }}" class="block bg-white shadow-sm rounded-lg p-4 hover:shadow-md hover:bg-gray-50 transition">
                        <p class="font-semibold text-gray-800">{{ $appointment->title }}</p>
                        <p class="text-sm text-gray-600">{{ $appointment->start_date_time->format('l d/m, Y H:i') }}</p>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        No appointments registered yet.
                    </div>
                @endforelse
            </div>

            <nav>
                <a href="{{ route('dashboard') }}"
                   class="text-sm text-gray-600 hover:text-gray-900 underline">
                    ← Back to Dashboard
                </a>
            </nav>

        </div>
    </div>
</x-app-layout>