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

    public bool $redirect = false;

    protected $listeners = [
        'start-confirmation' => 'startDeleteConfirmation',
    ];

    public function mount(bool $redirect = false)
    {
        $this->redirect = $redirect;
    }

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

        if ($this->redirect) {
            session()->flash('flash.banner', 'The employee profile is removed successfully.');
            session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('employees.index');
        } else {
            $this->dispatchBrowserEvent('banner-message', [
                'style' => 'success',
                'message' => 'The employee profile is removed successfully.',
            ]);

            $this->reset();
            $this->emitTo('employee.datatable', 'refreshDatatable');
        }
    }

    public function render()
    {
        return view('livewire.employee.delete-confirmation');
    }
}
