<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditForm extends Component
{
    use WithFileUploads;

    public ?Company $company = null;
    public $state = [
        'name' => '',
        'email' => null,
        'logo_path' => null,
        'website_url' => null,
    ];
    public $logo = null;

    public bool $startEdit = false;

    protected $listeners = [
        'start-edit-form' => 'startEditForm'
    ];

    protected $rules = [
        'state.name' => 'required',
        'state.email' => 'email|nullable',
        'state.website_url' => 'url|nullable',
        'logo' => 'nullable|image|max:2048'
    ];

    public function startEditForm(int $id)
    {
        $this->dispatchBrowserEvent('reset-photo-preview');
        $this->reset();

        $this->company = Company::findOrFail($id);
        $this->state = $this->company->only(['name', 'email', 'logo_path', 'website_url']);
        $this->startEdit = true;
    }

    public function saveCompany()
    {
        $validated = $this->validate();

        if(isset($this->logo)) {
            $this->company->updateLogo($this->logo);
        }

        $this->company->update($validated['state']);

        $this->dispatchBrowserEvent('banner-message', [
            'style' => 'success',
            'message' => 'Company profile is updated successfully'
        ]);

        $this->reset();
        $this->emitTo('company.datatable', 'refreshDatatable');
        $this->emitTo('company.profile', 'refresh-profile');
    }

    public function deleteLogo()
    {
        $this->company->deleteLogo();

        $this->state['logo_path'] = null;
        $this->reset('logo');
        $this->emitTo('company.profile', 'refresh-profile');
    }

    public function render()
    {
        return view('livewire.company.edit-form');
    }
}
