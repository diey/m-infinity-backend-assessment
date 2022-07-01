<?php

namespace App\Http\Livewire\Employee;

use App\Models\Company;
use App\Models\Employee;
use Livewire\Component;

class EditForm extends Component
{
    public bool $startEmployeeEdit = false;
    public ?Employee $employee = null;
    public array $state = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'company_id' => '',
    ];

//    public ?string $first_name = null;
//    public ?string $last_name = null;
//    public ?string $email = null;
//    public ?string $phone = null;
//    public ?int $company = null;
    public array $companies = [];

    protected $listeners = [
        'start-edit-form' => 'startEditForm'
    ];

    protected $rules = [
        'state.first_name' => 'required',
        'state.last_name' => 'required',
        'state.email' => 'nullable|email',
        'state.phone' => 'nullable|numeric|digits_between:9,11|regex:/^[1-9][0-9]*$/',
        'state.company_id' => 'required|numeric|exists:companies,id'
    ];

    public function mount()
    {
        $this->companies = Company::all()->pluck('name', 'id')->toArray();
    }

    public function startEditForm(int $id)
    {
        $this->resetExcept('companies');

        $this->employee = Employee::with('company')->findOrFail($id);
        $this->state = $this->employee->only(['first_name', 'last_name', 'email', 'company_id']);
        $this->state['phone'] = !is_null($this->employee->phone) ? substr($this->employee->getRawOriginal('phone'), 2) : '';
        $this->startEmployeeEdit = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveEmployee()
    {
        $validated = $this->validate();
        $this->employee->update($validated['state']);

        session()->flash('flash.banner', 'Employee profile is updated successfully');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('employees.index');
    }

    public function render()
    {
        return view('livewire.employee.edit-form');
    }
}
