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

    protected $listeners = [
        'start-confirmation' => 'startDeleteConfirmation'
    ];

    public function startDeleteConfirmation(int $id)
    {
        $this->company = Company::withCount('employees')->findOrFail($id);
        $this->name = $this->company->name;
        $this->totalEmployee = $this->company->employees_count;

        $this->startConfirmingDelete = true;
    }

    public function deleteCompany()
    {
        if(!is_null($this->company->logo_path)) {
            Storage::disk('public')->delete($this->company->logo_path);
        }

        $this->company->employees()->delete();
        $this->company->delete();

        $this->reset();
        $this->emitTo('company.datatable', 'refreshDatatable');
    }

    public function render()
    {
        return view('livewire.company.delete-confirmation');
    }
}
