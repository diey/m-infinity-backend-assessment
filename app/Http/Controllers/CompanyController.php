<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function show(Company $company)
    {
        $company->loadCount('employees');

        return view('company.show')->with('company', $company);
    }
}
