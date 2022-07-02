<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;

class EmployeeList extends Component
{
    public Company $company;

    protected $listeners = [
        'refresh-employee-list' => '$refresh',
    ];

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.company.employee-list');
    }
}
