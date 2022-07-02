<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;

class Profile extends Component
{
    public Company $company;

    protected $listeners = [
        'refresh-profile' => '$refresh',
    ];

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function render()
    {
        return view('livewire.company.profile');
    }
}
