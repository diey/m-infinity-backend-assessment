<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    public function show(Employee $employee)
    {
        $employee->load('company');

        return view('employee.show')->with('employee', $employee);
    }
}
