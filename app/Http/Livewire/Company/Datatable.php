<?php

namespace App\Http\Livewire\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Datatable extends DataTableComponent
{
    /**
     * @return void
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setDefaultSort('created_at', 'desc');
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->searchable()
                ->sortable()
                ->format(fn($value, $row) => view('company.column.name')->with('row', $row)),
            Column::make('Email', 'email')
                ->searchable()
                ->collapseOnTablet()
                ->format(fn($value) => !is_null($value) ? '<span class="font-mono">'.$value.'</span>' : '<span class="text-gray-400">-</span>')->html(),
            Column::make('Employees')->label(function ($row) {
                return $row->employees_count.' '.str('person')->plural($row->employees_count);
            }),
            Column::make('Last Update', 'updated_at')
                ->sortable()
                ->collapseOnTablet()
                ->format(fn($value) => $value->format('d/m/Y h:ia')),
            Column::make('Action')
                ->label(fn($row) => view('company.column.action')->with('row', $row))
        ];
    }

    /**
     * @return Builder
     */
    public function builder(): Builder
    {
        return Company::withCount('employees');
    }
}
