<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1.5">
                {{ __('Employees') }}
            </h2>
            <livewire:employee.registration-form/>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-xl sm:rounded-lg">
                <livewire:employee.datatable/>
            </div>
        </div>
        <livewire:employee.edit-form/>
        <livewire:employee.delete-confirmation/>
{{--        <livewire:company.delete-confirmation/>--}}
    </div>
</x-app-layout>
