<div class="bg-white shadow-xl sm:rounded-lg">
    <div class="md:flex justify-between p-6 border-b border-gray-200">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Company Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Details of the registered company.</p>
        </div>
        <div class="text-right pt-2 space-x-1">
            <x-jet-button wire:click="$emitTo('company.edit-form', 'start-edit-form', {{ $company->id }})">
                <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <span>Edit</span>
            </x-jet-button>
            <x-jet-danger-button wire:click="$emitTo('company.delete-confirmation', 'start-confirmation', {{ $company->id }})">
                <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <span>Delete</span>
            </x-jet-danger-button>
        </div>
    </div>
    <div class="divide-y-2 divide-gray-100 text-sm">
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
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Registered At</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $company->created_at->format('l, d F Y h:ia') }}</dd>
            </div>
        </dl>
        <dl>
            <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="font-medium text-gray-500">Last Update At</dt>
                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2">{{ $company->updated_at->format('l, d F Y h:ia') }}</dd>
            </div>
        </dl>
    </div>
</div>
