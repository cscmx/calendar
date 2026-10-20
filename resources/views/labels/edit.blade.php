<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit label') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white shadow-sm rounded-lg p-6">
                <form method="POST" action="{{ route('labels.update', $label) }}">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div>
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $label->name)" required autofocus/>
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                        
                        <a href="{{ route('labels.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                            Cancel
                        </a>

                        <x-danger-button form="delete-button" onclick="return confirm('Are you sure you want to delete this label?')">{{ __('Delete') }}</x-danger-button>
                    </div>
                </form>
            </div>

            <div class="px-6">
                <a href="{{ route('labels.index') }}"
                   class="text-sm text-gray-600 hover:text-gray-900 underline">
                    ← Back to labels
                </a>
            </div>

        </div>
    </div>

    <form method="POST" action="{{ route('labels.destroy', $label) }}" class="hidden" id="delete-button">
        @csrf 
        @method('DELETE')
    </form>

</x-app-layout>