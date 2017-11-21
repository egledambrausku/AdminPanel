<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\AddEmployeeRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function __construct(Employee $employee, Company $company)
    {
        $this->employee=$employee;
        $this->company=$company;
    }
    
    public function index()
    {
        $employees=$this->employee->orderBy('name', 'asc')->get();
        return view('employees.employList', compact('employees', 'companies'));
    }

    public function create()
    {
        $companies = Company::pluck('name', 'id');
        return view('employees.addEmploy', compact('companies'));
    }

    public function store(AddEmployeeRequest $request)
    {
        $employee=$this->employee->create($request->all());
        return redirect('admin/employees');
    }

    public function show($id)
    {
        $employee=$this->employee->where('id', $id)->first();
        return view('employees.showEmploy', compact('employee'));
    }
    
    public function edit($id)
    {
        $employee=$this->employee->where('id', $id)->first();
        $companies = Company::pluck('name', 'id');
        return view('employees.editEmploy', compact('employee', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $employee=$this->employee->where('id', $id)->first();
        $employee->update($request->all());
        return redirect('admin/employees/' . $employee->id);
    }

    public function destroy($id)
    {
        $this->employee->find($id)->delete();
        return redirect('admin/employees');
    }
}
