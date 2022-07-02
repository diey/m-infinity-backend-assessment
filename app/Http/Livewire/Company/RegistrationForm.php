<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationForm extends Component
{
    use WithFileUploads;

    public bool $startCompanyRegistration = false;

    public string $name = '';

    public ?string $email = null;

    public $logo = null;

    public ?string $website_url = null;

    protected $rules = [
        'name' => 'required',
        'email' => 'email|nullable',
        'website_url' => 'url|nullable',
        'logo' => 'nullable|image|max:2048',
    ];

    public function openRegistration()
    {
        $this->dispatchBrowserEvent('reset-photo-preview');
        $this->reset();
        $this->startCompanyRegistration = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveCompany()
    {
        $validated = $this->validate();

        $company = new Company($validated);
        $company->save();

        if (isset($this->logo)) {
            $company->updateLogo($this->logo);
        }

        $this->dispatchBrowserEvent('banner-message', [
            'style' => 'success',
            'message' => 'New company profile is registered successfully. You may now assign a new employee to the company.',
        ]);

        $this->reset();
        $this->emitTo('company.datatable', 'refreshDatatable');
    }

    public function render()
    {
        return view('livewire.company.registration-form');
    }
}
