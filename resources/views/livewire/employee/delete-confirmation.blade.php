<div>
    @once
        <x-jet-dialog-modal wire:model="startConfirmingDelete">
            <x-slot name="title">
                Delete Employee Profile
            </x-slot>

            <x-slot name="content">
                Are you sure you want to delete the employee profile?
                Once employee profile deleted, it will also removed from company's employee list.

                <div class="mt-4">
                    <div class-="text-xs text-gray-400">Employee Name</div>
                    <div class="text-base font-semibold ml-2">{{ $name }}</div>
                </div>

                <div class="mt-4">
                    <div class-="text-xs text-gray-400">Company Name</div>
                    <div class="text-base font-semibold ml-2">{{ $companyName }}</div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('startConfirmingDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteEmployee" wire:loading.attr="disabled">
                    {{ __('Confirm Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endonce
</div>
