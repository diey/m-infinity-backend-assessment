<div class="bg-white shadow-xl sm:rounded-lg">
    <div class="md:flex justify-between p-6 border-b border-gray-200">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Employee Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Details of the registered employee.</p>
        </div>
        <div class="text-right pt-2 space-x-1">
            <x-jet-button wire:click="$emitTo('employee.edit-form', 'start-edit-form', {{ $employee->id }})">
                <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <span>Edit</span>
            </x-jet-button>
            <x-jet-danger-button wire:click="$emitTo('employee.delete-confirmation', 'start-confirmation', {{ $employee->id }})">
                <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <span>Delete</span>
            </x-jet-danger-button>
        </div>
    </div>
    <div class="divide-y-2 divide-gray-100 text-sm">
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">First Name</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $employee->first_name }}</dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Last Name</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $employee->last_name }}</dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Company Name</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">
                    <a href="{{ route('companies.show', $employee->company->id) }}" target="_blank" class="text-indigo-500 hover:text-indigo-600 hover:underline">
                        {{ $employee->company->name }}
                    </a>
                </dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Email</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $employee->email }}</dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Phone No.</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $employee->phone }}</dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Registered At</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $employee->created_at->format('l, d F Y h:ia') }}</dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Last Update At</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $employee->updated_at->format('l, d F Y h:ia') }}</dd>
            </div>
        </dl>
    </div>
</div>
