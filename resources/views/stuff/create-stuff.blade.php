<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouvel Équipement') }}
        </h2>
    </x-slot>

 <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pb-3">
                    <livewire:stuff.create-stuff/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
