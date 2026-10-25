<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ __('Appointment details') }}
            </h2>

            <a href="{{ route('appointments.create') }}" class="inline-flex items-center px-4 py-2 bg-lime-300 border border-transparent rounded-md font-semibold text-xs text-stone-600 uppercase tracking-widest hover:bg-lime-200 text-stone-800 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Add appointment
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" action="{{ route('appointments.index') }}" class="flex flex-col gap-4 md:flex-row md:flex-wrap md:items-end">
                    <div class="flex flex-col">
                        <label for="label" class="mb-1 text-sm font-medium text-stone-700">
                            Label
                        </label>
                        <select name="label" id="label" class="border-stone-300 rounded-md shadow-sm focus:border-lime-500 focus:ring-lime-500">
                            <option value="">All labels</option>
                            @foreach ($labels as $label)
                                <option value="{{ $label->id }}" @selected(request('label') == $label->id)>
                                    {{ $label->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="member" class="mb-1 text-sm font-medium text-stone-700">
                            Member
                        </label>
                        <select name="member" id="member"
                                class="border-stone-300 rounded-md shadow-sm focus:border-lime-500 focus:ring-lime-500">
                            <option value="">All members</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}" @selected(request('member') == $member->id)>
                                        {{ $member->name }}
                                    </option>
                                @endforeach
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="filter" class="mb-1 text-sm font-medium text-stone-700">Date</label>
                        <select name="filter" id="filter" class="border-stone-300 rounded-md shadow-sm focus:border-lime-500 focus:ring-lime-500">
                            <option value="">All dates</option>
                            <option value="today" @selected(request('filter') === 'today')>Today</option>
                            <option value="week" @selected(request('filter') === 'week')>This week</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="is_highlighted" class="mb-1 text-sm font-medium text-stone-700">
                            Is Highlighted
                            <input id="is_highlighted" name="is_highlighted" type="checkbox" value="1" {{ request('is_highlighted') ? 'checked' : '' }}>
                        </label>
                    </div>
        
                    <x-primary-button>{{ __('Filter') }}</x-primary-button>

                    @if (request('label') || request('member') || request('is_highlighted') || request('filter'))
                        <a href="{{ route('appointments.index') }}" class="text-sm text-stone-600 hover:text-stone-900 underline pb-2">Clear filters</a>
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