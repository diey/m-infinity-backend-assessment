<div class="flex space-x-3">
    <button type="button" wire:click="$emitTo('employee.edit-form', 'start-edit-form', {{ $row->employee_id }})"
            class="text-orange-500 hover:text-orange-600 hover:underline">
        Edit
    </button>
    <button type="button" wire:click="$emitTo('employee.delete-confirmation', 'start-confirmation', {{ $row->employee_id }})"
            class="text-rose-500 hover:text-rose-600 hover:underline">
        Delete
    </button>
</div>
