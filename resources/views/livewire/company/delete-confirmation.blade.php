<div>
    @once
        <x-jet-dialog-modal wire:model="startConfirmingDelete">
            <x-slot name="title">
                Delete Company Profile
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete the company profile?
                Once company profile deleted, all of its registered employee will also remove.

                <div class="mt-4">
                    <div class-="text-xs text-gray-400">Company Name</div>
                    <div class="text-base font-semibold ml-2">{{ $name }}</div>
                </div>

                <div class="mt-4">
                    <div class-="text-xs text-gray-400">Total Employee</div>
                    <div class="text-base font-semibold ml-2">{{ $totalEmployee }} {{ str('person')->plural($totalEmployee) }}</div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('startConfirmingDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteCompany" wire:loading.attr="disabled">
                    {{ __('Confirm Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endonce
</div>
