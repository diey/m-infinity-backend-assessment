<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight py-1.5">
                {{ __('Company Profile') }}
            </h2>
{{--            <livewire:company.registration-form/>--}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Company Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Details of the registered company.</p>
                </div>
                <div class="divide-y-2 divide-gray-100">
                    <dl>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">Logo</dt>
                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if($company->hasLogo())
                                    <div class="mt-2">
                                        <img src="{{ secure_asset($company->logo_url) }}" alt="{{ $company->name }}" class="w-44 h-44 object-cover border p-0.5 border-slate-200">
                                    </div>
                                @else
                                    <span class="text-xs text-slate-400">No logo uploaded</span>
                                @endif
                            </dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">Name</dt>
                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $company->name }}</dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $company->email }}</dd>
                        </div>
                    </dl>
                    <dl>
                        <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="font-medium text-gray-500">Website</dt>
                            <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                                @if(!is_null($company->website_url))
                                    <a href="{{ $company->website_url }}" target="_blank" class="text-indigo-500 hover:text-indigo-600 hover:underline">
                                        {{ $company->website_url }}
                                    </a>
                                @endif
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="bg-white shadow-xl sm:rounded-lg mt-10">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Employees ({{ $company->employees_count }} {{ str('person')->plural($company->employees_count) }})</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">List of registered employees for the company.</p>
                </div>
                <div class="p-6">
                    @if($company->employees_count > 0)
                        <livewire:employee.datatable :company="$company"/>
                    @else
                        <div class="text-center text-italic text-gray-600">No employeee registered for this company</div>
                    @endif
                </div>
            </div>
        </div>
        <livewire:employee.edit-form/>
        <livewire:employee.delete-confirmation/>
    </div>
</x-app-layout>
