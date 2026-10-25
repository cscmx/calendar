<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Members') }}
            </h2>

            <a href="{{ route('members.create') }}"
               class="inline-flex items-center px-4 py-2 bg-lime-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-lime-200">
                Add member
            </a>
        </div>
    </x-slot>

    @php
        $categories = [
            'personal' => 'Personal',
            'family_member' => 'Family member',
            'pet' => 'Pet',
            'home' => 'Home'
        ];
    @endphp

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

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

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                @if ($members->isEmpty())
                    <div class="text-center py-12 text-gray-500">
                        No members registered yet.
                    </div>
                @else
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-lime-100">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-16">Color</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date of birth</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($members as $member)
                                <tr class="hover:bg-stone-100">
                                    <td class="px-4 py-3">
                                        <span class="inline-block w-5 h-5 rounded-full border border-gray-200" style="background-color: {{ $member->color }}"></span>
                                    </td>

                                    <td class="px-4 py-3">
                                        <a href="{{ route('members.edit', $member) }}" class="font-medium text-stone-800 hover:text-lime-600">
                                            {{ $member->name }}
                                        </a>
                                    </td>

                                    <td class="px-4 py-3 text-sm text-stone-600">
                                        {{ $member->date_of_birth ? $member->date_of_birth->format('d/m/Y') : '—' }}
                                    </td>

                                    <td class="px-4 py-3 text-sm text-stone-600">
                                        {{ $categories[$member->category] }}
                                    </td>

                                    <td class="px-4 py-3 text-right">
                                        <div class="flex items-center justify-end gap-1">
                                            <a href="{{ route('members.edit', $member) }}" class="inline-flex p-2 rounded-md text-stone-500 hover:bg-stone-100 hover:text-stone-700" title="Edit">
                                                <x-heroicon-o-pencil-square class="w-5 h-5" />
                                            </a>

                                            <form method="POST" action="{{ route('members.destroy', $member) }}" onsubmit="return confirm('Are you sure you want to delete this member?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-md text-stone-500 hover:bg-red-100 hover:text-red-600" title="Delete">
                                                    <x-heroicon-o-trash class="w-5 h-5" />
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div>
                <a href="{{ route('dashboard') }}"
                   class="text-sm text-gray-600 hover:text-gray-900 underline">
                    ← Back to Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>