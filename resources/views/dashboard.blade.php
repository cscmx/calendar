<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="font-semibold text-xl text-stone-700 leading-tight">
                <p>Hello,  {{ $user->name }}</p>
                <p class="text-sm text-stone-500 ">{{ __('Here is your calendar in a blink') }}</p>
            </div>
            <a href="{{ route('appointments.create') }}" class="items-center px-4 py-2 bg-lime-300 border border-transparent rounded-md font-semibold text-xs text-stone-600 uppercase tracking-widest hover:bg-lime-200 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + New appointment
            </a>
        </div>
    </x-slot>

    
    <div class="py-8">
        
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <section class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <nav class="flex justify-between">
                    <div class="flex gap-2">
                        <a href="{{ route('dashboard', ['filter' => 'today']) }}" class="px-3 py-1 text-sm rounded-md border {{ $filter === 'today' ? 'bg-lime-300 text-stone-600' : 'bg-white text-stone-700 hover:bg-lime-100' }}">
                                Today
                        </a>
                        <a href="{{ route('dashboard', ['filter' => 'week']) }}" class="px-3 py-1 text-sm rounded-md border {{ $filter === 'week' ? 'bg-lime-300 text-stone-600' : 'bg-white text-stone-700 hover:bg-lime-100' }}">
                                This week
                        </a>
                        <a href="{{ route('dashboard', ['filter' => 'all']) }}" class="px-3 py-1 text-sm rounded-md border {{ $filter === 'all' ? 'bg-lime-300 text-stone-600' : 'bg-white text-stone-700 hover:bg-lime-100' }}">
                                All
                        </a>

                    </div>
 
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-calendar class="w-5 h-5" />
                        <span class="font-semibold text-stone-600"> {{ $dateOfToday->format('F jS, Y')}}</span>
                    </div>
                </nav>
            </section>
        </div>
    </div>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-stone-50 shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-stone-100">
                <thead class="bg-lime-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-stone-500 uppercase tracking-wider">Name</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-stone-300">
                    @forelse ($appointments as $appointment)
                        <tr class="hover:bg-stone-100">
                            <td class="px-4 py-3 text-sm text-stone-600">
                                <div class="flex items-center gap-2">
                                    <x-heroicon-o-clock class="w-4 h-4" />
                                    <span>{{ $appointment->start_date_time->format('H:i') }}</span>
                                    <span>{{ $appointment->start_date_time->format('l d/m, Y') }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3 font-semibold text-stone-800">
                                <a href="{{ route('appointments.show', $appointment) }}">{{ $appointment->title }}</a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-12 text-stone-500">
                                No appointments to show.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
