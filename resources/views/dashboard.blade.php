<x-app-layout>
    <x-slot name="pageTitle">Welcome to {{ config('app.name') }}</x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 px-5 md:px-0">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <h3 class="uppercase font-bold text-slate-600">Total Companies</h3>
                    <div class="text-right mt-2">
                        <span class="font-extrabold font-mono text-emerald-500 text-4xl">{{ number_format($count['companies']) }}</span>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <h3 class="uppercase font-bold text-slate-600">Total Employees</h3>
                    <div class="text-right mt-2">
                        <span class="font-extrabold font-mono text-emerald-500 text-4xl">{{ number_format($count['employees']) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
