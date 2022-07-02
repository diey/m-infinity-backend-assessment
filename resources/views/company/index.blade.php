<x-app-layout>
    <x-slot name="pageTitle">Companies Management - {{ config('app.name') }}</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1.5">
                {{ __('Companies') }}
            </h2>
            <livewire:company.registration-form/>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <livewire:company.datatable/>
            </div>
        </div>
        <livewire:company.edit-form/>
        <livewire:company.delete-confirmation/>
    </div>
</x-app-layout>
