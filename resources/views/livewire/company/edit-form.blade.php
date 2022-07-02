<div>
    @once
        <div>
            <x-jet-dialog-modal id="company-registration-form" wire:model="startEdit">
                <x-slot name="title">
                    Edit Company Profile
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

                                @if(!is_null($company) && $company->hasLogo())
                                <div class="mt-2">
                                    <img src="{{ secure_asset($company->logo_url) }}" alt="{{ $state['name'] }}" class="w-44 h-44 object-cover border p-0.5 border-slate-200">
                                </div>
                                @endif

                                <!-- New Profile Photo Preview -->
                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                <span class="block w-44 h-44 bg-cover bg-no-repeat bg-center"
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                                </div>

                                <div class="flex">
                                    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.logo.click()">
                                        {{ __('Select A New Logo') }}
                                    </x-jet-secondary-button>
                                    @if(!is_null($state['logo_path']))
                                        <x-jet-danger-button type="button" class="mt-2" wire:click="deleteLogo">
                                            {{ __('Remove Logo') }}
                                        </x-jet-danger-button>
                                    @endif
                                </div>
                                <div class="text-xs text-gray-400 mt-1">Recommended to use square photo with size 500px x 500px</div>
                                <div class="text-xs text-gray-400 mt-1">Only accept image with file size is 2MB</div>
                                <x-jet-input-error for="photo" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="name">Name <span class="text-rose-500">*</span></x-jet-label>
                                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.lazy="state.name" />
                                <x-jet-input-error for="name" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="email" value="{{ __('Email') }}" />
                                <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.lazy="state.email" />
                                <x-jet-input-error for="email" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="website" value="{{ __('Website URL') }}" />
                                <x-jet-input id="website" type="email" class="mt-1 block w-full" wire:model.lazy="state.website_url" />
                                <x-jet-input-error for="website" class="mt-2" />
                            </div>
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('startEdit')" wire:loading.attr="disabled">
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
    @endonce
</div>
