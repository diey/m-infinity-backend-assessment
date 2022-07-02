<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteConfirmation extends Component
{
    public bool $startConfirmingDelete = false;

    public ?Company $company = null;

    public string $name = '';

    public int $totalEmployee = 0;

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
        $this->company = Company::withCount('employees')->findOrFail($id);
        $this->name = $this->company->name;
        $this->totalEmployee = $this->company->employees_count;

        $this->startConfirmingDelete = true;
    }

    public function deleteCompany()
    {
        if (! is_null($this->company->logo_path)) {
            Storage::disk('public')->delete($this->company->logo_path);
        }

        $this->company->employees()->delete();
        $this->company->delete();

        if ($this->redirect) {
            session()->flash('flash.banner', 'The company profile and all of its employee\'s record is removed successfully.');
            session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('companies.index');
        } else {
            $this->dispatchBrowserEvent('banner-message', [
                'style' => 'success',
                'message' => 'The company profile and all of its employee\'s record is removed successfully.',
            ]);

            $this->reset();
            $this->emitTo('company.datatable', 'refreshDatatable');
        }
    }

    public function render()
    {
        return view('livewire.company.delete-confirmation');
    }
}
