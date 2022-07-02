<x-app-layout>
    <x-slot name="pageTitle">{{ $employee->full_name }} Profile - {{ config('app.name') }}</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1.5">
                {{ __('Employee Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:employee.profile :employee="$employee"/>
        </div>
        <livewire:employee.delete-confirmation :redirect="true"/>
        <livewire:employee.edit-form/>
    </div>
</x-app-layout>
