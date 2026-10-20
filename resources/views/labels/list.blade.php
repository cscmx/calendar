<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Labels') }}
            </h2>

            <a href="{{ route('labels.create') }}" class="inline-flex items-center px-4 py-2 bg-lime-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-lime-200">
                Add label
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if (session('error'))
                <div class="p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @forelse ($labels as $label)
                    <div class="bg-white shadow-sm rounded-lg p-4 flex flex-col items-center gap-3">

                        <p class="font-semibold text-gray-800">
                            {{ $label->name }}
                        </p>

                        <div class="flex gap-2">

                            <a href="{{ route('labels.edit', $label) }}" class="p-2 rounded-md text-gray-500 hover:bg-lime-100 hover:text-gray-700" title="Edit">
                                <x-heroicon-o-pencil-square class="w-5 h-5" />
                            </a>

                            <form method="POST" action="{{ route('labels.destroy', $label) }}" onsubmit="return confirm('Are you sure you want to delete this label?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-md text-gray-500 hover:bg-red-50 hover:text-red-500" title="Delete">
                                    <x-heroicon-o-trash class="w-5 h-5" />
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        No labels registered yet.
                    </div>
                @endforelse
            </div>

            <div>
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900 underline">
                    ← Back to Dashboard
                </a>
            </div>

        </div>
    </div>

</x-app-layout>