<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1.5">
                {{ __('Companies') }}
            </h2>
            <div>
                <button type="button" class="focus:outline-none text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4
                focus:ring-indigo-300 font-medium rounded text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                    Register</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <livewire:company.datatable/>
            </div>
        </div>
    </div>
</x-app-layout>
