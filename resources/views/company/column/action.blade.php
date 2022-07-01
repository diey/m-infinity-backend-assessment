<div class="flex space-x-3">
    <button type="button" wire:click="$emitTo('company.edit-form', 'start-edit-form', {{ $row->id }})"
            class="text-orange-500 hover:text-orange-600 hover:underline">
        Edit
    </button>
    <button type="button" wire:click="$emitTo('company.delete-confirmation', 'start-confirmation', {{ $row->id }})"
            class="text-rose-500 hover:text-rose-600 hover:underline">
        Delete
    </button>
</div>
