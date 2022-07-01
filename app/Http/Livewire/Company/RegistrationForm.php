<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Illuminate\Http\Request;
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
        'logo' => 'nullable|image|max:2048'
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

        if(isset($this->logo)) {
            $company->updateLogo($this->logo);
        }

        session()->flash('flash.banner', 'New company profile is registered successfully. You may now assign a new employee to the company.');
        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('companies.index');

    }

    public function render()
    {
        return view('livewire.company.registration-form');
    }
}
