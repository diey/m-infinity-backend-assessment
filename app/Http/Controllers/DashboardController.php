<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $count['companies'] = Company::count();
        $count['employees'] = Employee::count();

        return view('dashboard', compact('count'));
    }
}
