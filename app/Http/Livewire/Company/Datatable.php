<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Datatable extends DataTableComponent
{
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('created_at', 'desc')
            ->setAdditionalSelects(['id']);
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Email', 'email')
                ->searchable(),
            Column::make('Employees')->label(function ($row) {
                return $row->employees_count.' '.str('person')->plural($row->employees_count);
            }),
            Column::make('Last Update', 'updated_at')
                ->sortable()
                ->collapseOnTablet()
                ->format(fn($value) => $value->format('d/m/Y h:ia')),
        ];
    }

    public function builder(): Builder
    {
        return Company::withCount('employees');
    }
}
