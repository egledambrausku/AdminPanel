<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\AddCompanyRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    public function __construct(Company $company, Employee $employee)
    {
        $this->company=$company;
        $this->employee=$employee;
    }

    public function index()
    {
        $companies=$this->company->get();
        
        return view('companies.compList', compact('companies', 'logos'));
    }
    
    public function create()
    {
        return view('companies.addComp');
    }
    
    public function store(AddCompanyRequest $request)
    {
        $logo=request()->file('logo');
        $storagePath=storage_path('app/public');
        $originalName=$logo->getClientOriginalName();
        $logo->move($storagePath, $originalName);

        $company=$this->company->create(array(
            'name' =>$request->input('name'),
            'address' =>$request->input('address'),
            'logo'=> $originalName));

      //  return $originalName;
     //   Storage::disk('local')->put($originalName, 'Contents');
        return  redirect('admin/companies');
    }

    public function show($id)
    {
        $company=$this->company->where('id', $id)->first();
        $employees=$this->employee->where('company_id', $id)->get();
        return view('companies.showComp', compact('company', 'employees', 'logo'));
    }

    public function edit($id)
    {
        $company=$this->company->where('id', $id)->first();
        return view('companies.editComp', compact('company'));
    }

    public function update(AddCompanyRequest $request, $id)
    {
        $company=$this->company->where('id', $id)->first();
        
        $logo=request()->file('logo');
        $storagePath=storage_path('app/public');
        $originalName=$logo->getClientOriginalName();
        $logo->move($storagePath, $originalName);

        $company->update(array(
            'name' =>$request->input('name'),
            'address' =>$request->input('address'),
            'logo'=> $originalName));

        return redirect('admin/companies/' . $company->id);
    }

    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect('admin/companies');
    }
}
