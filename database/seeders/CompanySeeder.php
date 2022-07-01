<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        Company::factory()
            ->count(50)
            ->has(Employee::factory()->count(100), 'employees')
            ->create();
    }
}
