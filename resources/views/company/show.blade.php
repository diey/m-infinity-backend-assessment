<x-app-layout>
    <x-slot name="pageTitle">{{ $company->name }} Profile - {{ config('app.name') }}</x-slot>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1.5">
                {{ __('Company Profile') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:company.profile :company="$company"/>

            <livewire:company.employee-list :company="$company"/>
        </div>
        <livewire:employee.registration-form :showButton="false"/>
        <livewire:company.edit-form/>
        <livewire:company.delete-confirmation :redirect="true"/>
        <livewire:employee.edit-form/>
        <livewire:employee.delete-confirmation/>
    </div>
</x-app-layout>
