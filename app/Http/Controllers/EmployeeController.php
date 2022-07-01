<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
