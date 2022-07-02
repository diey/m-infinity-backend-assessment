<?php

namespace App\Http\Livewire\Employee;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Datatable extends DataTableComponent
{
    public ?Company $company = null;

    public function mount(?Company $company = null)
    {
        $this->company = $company;
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setAdditionalSelects(['employees.id as employee_id', 'companies.id as company_id'])
            ->setEagerLoadAllRelationsEnabled()
            ->setDefaultSort('employees.created_at', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('Full Name', 'first_name')
                ->sortable()
                ->searchable()
                ->format(fn ($value, $row) => view('employee.column.name')->with('row', $row)),
            Column::make('last name', 'last_name')
                ->hideIf(true)
                ->searchable(),
            Column::make('Email', 'email')
                ->searchable()
                ->format(fn ($value) => ! is_null($value) ? '<span class="font-mono">'.$value.'</span>' : '<span class="text-gray-400 text-xs">no data</span>')->html(),
            Column::make('Phone', 'phone')
                ->collapseOnTablet()
                ->hideIf(is_null($this->company))
                ->format(fn ($value) => ! is_null($value) ? '<span>'.$value.'</span>' : '<span class="text-gray-400 text-xs">no data</span>')->html(),
            Column::make('Company', 'company.name')
                ->hideIf(! is_null($this->company))
                ->format(fn ($value, $row) => view('employee.column.company')->with('row', $row)),
            Column::make('Registered', 'created_at')
                ->sortable()
                ->collapseOnTablet()
                ->hideIf(is_null($this->company))
                ->format(fn ($value) => $value->format('d/m/Y h:ia')),
            Column::make('Last Update', 'updated_at')
                ->sortable()
                ->collapseOnTablet()
                ->hideIf(! is_null($this->company))
                ->format(fn ($value) => $value->format('d/m/Y h:ia')),
            Column::make('Action')
                ->label(fn ($row) => view('employee.column.action')->with('row', $row)),
        ];
    }

    public function builder(): Builder
    {
        return Employee::query()
            ->when(! is_null($this->company->id), fn ($q) => $q->withWhereHas('company', fn ($query) => $query->where('id', $this->company->id)))
            ->when(is_null($this->company->id), fn ($q) => $q->with('company'));
    }
}
