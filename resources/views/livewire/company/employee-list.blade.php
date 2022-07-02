<div class="bg-white shadow-xl sm:rounded-lg mt-10">
    <div class="md:flex justify-between p-6 border-b border-gray-200">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Employees</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">List of registered employees for the company.</p>
        </div>
        <div class="text-right pt-2">
            <x-jet-button wire:click="$emitTo('employee.registration-form', 'employee-registration-form', {{ $company->id }})">
                <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                <span>Add Employee</span>
            </x-jet-button>
        </div>
    </div>
    <div class="p-6">
        @if($company->employees_count > 0)
            <livewire:employee.datatable :company="$company"/>
        @else
            <div class="text-center text-italic text-gray-600">No employeee registered for this company</div>
        @endif
    </div>
</div>
