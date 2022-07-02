<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;

class Profile extends Component
{
    public Employee $employee;

    protected $listeners = [
        'refresh-profile' => '$refresh',
    ];

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee.profile');
    }
}
