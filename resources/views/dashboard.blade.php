<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:crypto-component/>
            </div>
        </div>
    </div>
    <div class="p-4">
        <livewire:crypto-table/>
    </div>
    <div class="p-4">
        <div class="p-4 pl-6 pr-6">
            <livewire:crypto-analytics/>
        </div>

    </div>
</x-app-layout>
