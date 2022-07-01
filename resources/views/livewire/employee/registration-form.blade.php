<div>
    <x-jet-button wire:click="openRegistration">
        <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        <span>Add Employee</span>
    </x-jet-button>

    <div>
        <x-jet-dialog-modal id="company-registration-form" wire:model="startEmployeeRegistration">
            <x-slot name="title">
                Employee Registration
            </x-slot>
            <x-slot name="content">
                <form wire:submit.prevent="saveEmployee">
                    <p>Complete the form below to register a new employee. You may enter any keyword to search for the company's name.</p>

                    <div class="mt-5 grid grid-cols-6 gap-4">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="first_name">First Name <span class="text-rose-500">*</span></x-jet-label>
                            <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.lazy="first_name" required/>
                            <x-jet-input-error for="first_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="last_name">Last Name <span class="text-rose-500">*</span></x-jet-label>
                            <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.lazy="last_name" required/>
                            <x-jet-input-error for="last_name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="email" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="phone" value="{{ __('Phone') }}" />
                            <div class="flex">
                                <div class="border border-r-0 border-gray-300 rounded-l-md shadow-sm block mt-1 py-2 px-2">+60</div>
                                <x-jet-input id="phone" type="text" class="mt-1 block w-full rounded-l-none" wire:model.lazy="phone" />
                            </div>
                            <x-jet-input-error for="phone" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="company" value="{{ __('Company Name') }}" />
                            <select id="company" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                wire:model.lazy="company">
                                @foreach($companies as $key => $company)
                                    <option value="{{ $key }}">{{ $company }}</option>
                                @endforeach
                            </select>
{{--                            <x-jet-input id="website" type="text" class="mt-1 block w-full" wire:model.lazy="company" />--}}
                            <x-jet-input-error for="company" class="mt-2" />
                        </div>
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('startEmployeeRegistration')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-3"
                              wire:click="saveCompany"
                              wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
