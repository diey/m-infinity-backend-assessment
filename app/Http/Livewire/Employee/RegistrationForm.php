<?php

namespace App\Http\Livewire\Employee;

use App\Models\Company;
use App\Models\Employee;
use Livewire\Component;

class RegistrationForm extends Component
{
    public bool $startEmployeeRegistration = false;
    public ?string $first_name = null;
    public ?string $last_name = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?int $company = null;
    public bool $companyLocked = false;
    public array $companies = [];
    public bool $showButton = true;

    protected $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'nullable|email',
        'phone' => 'nullable|numeric|digits_between:9,11|regex:/^[1-9][0-9]*$/',
        'company' => 'required|numeric|exists:companies,id'
    ];

    protected $listeners = [
        'employee-registration-form' => 'employeeRegistration'
    ];

    public function employeeRegistration(int $id)
    {
        $this->startEmployeeRegistration = true;
        $this->companyLocked = true;
        $this->company = $id;
    }

    public function mount(bool $showButton = true)
    {
        $this->companies = Company::all()->pluck('name', 'id')->toArray();
        $this->showButton = $showButton;
    }

    public function openRegistration()
    {
        $this->startEmployeeRegistration = true;
        $this->company = array_key_first($this->companies);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCompany()
    {
        $validated = $this->validate();

        $employee = new Employee();
        $employee->first_name = $validated['first_name'];
        $employee->last_name = $validated['last_name'];
        $employee->email = $validated['email'];
        $employee->phone = $validated['phone'];
        $employee->company_id = $validated['company'];
        $employee->save();

        $this->dispatchBrowserEvent('banner-message', [
            'style' => 'success',
            'message' => 'New employee profile is registered successfully.'
        ]);

        $this->resetExcept('companies');
        $this->emitTo('employee.datatable', 'refreshDatatable');
    }

    public function render()
    {
        return view('livewire.employee.registration-form');
    }
}
