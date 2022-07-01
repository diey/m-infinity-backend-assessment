<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class DeleteConfirmation extends Component
{
    public bool $startConfirmingDelete = false;

    public ?Employee $employee = null;
    public string $name = '';
    public string $companyName = '';

    protected $listeners = [
        'start-confirmation' => 'startDeleteConfirmation'
    ];

    public function startDeleteConfirmation(int $id)
    {
        $this->employee = Employee::with('company')->findOrFail($id);
        $this->name = $this->employee->full_name;
        $this->companyName = $this->employee->company->name;

        $this->startConfirmingDelete = true;
    }

    public function deleteEmployee()
    {
        $this->employee->delete();

        $this->reset();
        $this->emitTo('employee.datatable', 'refreshDatatable');
    }

    public function render()
    {
        return view('livewire.employee.delete-confirmation');
    }
}