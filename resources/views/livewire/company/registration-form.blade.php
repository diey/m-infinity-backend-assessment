<div>
    <x-jet-button wire:click="openRegistration">
        <svg class="w-4 h-4 mr-2 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        <span>Add Company</span>
    </x-jet-button>

    <div>
        <x-jet-dialog-modal id="company-registration-form" wire:model="startCompanyRegistration">
            <x-slot name="title">
                Company Registration
            </x-slot>
            <x-slot name="content">
                <form wire:submit.prevent="saveCompany">
                    <p>Complete the form below to register a new company's profile.</p>

                    <div class="mt-5 grid grid-cols-6 gap-4">

                        <div x-data="{photoName: null, photoPreview: null}" @reset-photo-preview.window="photoName = null; photoPreview = null" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                   wire:model="logo"
                                   x-ref="logo"
                                   x-on:change="
                                    photoName = $refs.logo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.logo.files[0]);
                            " />

                            <x-jet-label for="logo" value="{{ __('Logo') }}" />

                            <!-- New Profile Photo Preview -->
                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-44 h-44 bg-cover bg-no-repeat bg-center"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>

                            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.logo.click()">
                                {{ __('Select A New Logo') }}
                            </x-jet-secondary-button>
                            <div class="text-xs text-gray-400 mt-1">Recommended to use square photo with size 500px x 500px</div>
                            <div class="text-xs text-gray-400">Only accept image with file size is 2MB</div>
                            <x-jet-input-error for="logo" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="name">Name <span class="text-rose-500">*</span></x-jet-label>
                            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.lazy="name" required/>
                            <x-jet-input-error for="name" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="email" />
                            <x-jet-input-error for="email" class="mt-2" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="website" value="{{ __('Website URL') }}" />
                            <x-jet-input id="website" type="text" class="mt-1 block w-full" wire:model.lazy="website_url" />
                            <x-jet-input-error for="website_url" class="mt-2" />
                        </div>
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('startCompanyRegistration')" wire:loading.attr="disabled">
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
