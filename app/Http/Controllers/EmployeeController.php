<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\helpers;
use App\Employee;
use Session;
use Image;
Use App\EmployeeSocialSecurity;
class EmployeeController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-employees', ['only' => ['create']]);
        $this->middleware('permission:update-employees',   ['only' => ['edit']]);
        $this->middleware('permission:read-employees|view-personal-profile',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-employees',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees=Employee::where('company_id',session('companyId'))->paginate(15);
        return view('manage.employees.index')->with('employees',$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nationalities=nationalities();
        $countries=countries();
        $regions=regions();
        $districts=districts();
        $banks=banks();
        $departments=departments();
        $designations=designations();
        $qualifications=qualifications();
        $workstations=workStations();
        $socialSecurities=socialSecurities();
        return view('manage.employees.create')->with('nationalities',$nationalities)
                                              ->with('countries',$countries)
                                              ->with('regions',$regions)
                                              ->with('districts',$districts)
                                              ->with('banks',$banks)
                                              ->with('departments',$departments)
                                              ->with('designations',$designations)
                                              ->with('qualifications',$qualifications)
                                              ->with('workstations',$workstations)
                                              ->with('socialSecurities',$socialSecurities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request, [
            'first_name' => 'required|min:2|max:100',
            'middle_name' => 'sometimes|nullable|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'marital_status'  => 'required|max:1',
            'gender'  => 'required|max:1',
            'phone_number'=>'sometimes|nullable|min:2|max:20',
            'account_number'=>'sometimes|nullable|min:2|max:50',
            'DOB'  => 'required|date',
            'licence_expiry'  => 'required|date',
            'basic_salary'  => 'required|numeric',
            'status'=>'required|max:20',
            'nationality_id'=>'required|numeric',
            'begin_date'  => 'required|date',
            'end_date'  => 'sometimes|nullable|date',
            'profile_picture'=>'sometimes|nullable|image',
            'bank_id'=>'sometimes|nullable|numeric',
            'department_id'=>'sometimes|nullable|numeric',
            'designation_id'=>'sometimes|nullable|numeric',
            'workStation_id'=>'sometimes|nullable|numeric',
          //  'comment'=>'sometimes|nullable|min:2|max:255'
          ]);
         $employee = new Employee;
         $employee->first_name=$request->first_name;
         $employee->middle_name=$request->middle_name;
         $employee->last_name=$request->last_name;
         $employee->marital_status=$request->marital_status;
         $employee->gender=$request->gender;
         $employee->phone_number=$request->phone_number;
         $employee->account_number=$request->account_number;
         $employee->DOB=$request->DOB;
         $employee->begin_date=$request->begin_date;
         $employee->end_date=$request->end_date;
         $employee->basic_salary=$request->basic_salary;
         $employee->nationality_id=$request->nationality_id;
         $employee->bank_id=$request->bank_id;
         $employee->department_id=$request->department_id;
         $employee->designation_id=$request->designation_id;
         $employee->workStation_id=$request->workStation_id;
         $employee->licence_expiry=$request->licence_expiry;
         
         $employee->company_id=session('companyId');
         
         $employee->status=$request->status;         
       //  $employee->comment=$request->comment;
        if ($request->hasFile('profile_photo')) {
            $image=$request->file('profile_photo');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $employee->profile_photo=$filename;
        }

        if ($request->hasFile('licence')){
            $licencename = time().'.'.$request->file('licence')->getClientOriginalExtension();
            
            $request->file('licence')->move(public_path('licences'), $licencename);
            $employee->licence=$licencename;

        }

        if ($request->hasFile('contract')){
            $contractname = time().'.'.$request->file('contract')->getClientOriginalExtension();
            
            $request->file('contract')->move(public_path('contracts'), $contractname);
            $employee->contract=$contractname;

        }
    
         $employee->save();

        //  if (isset($request->social_securities)) {
        //     $employee->socialSecurities()->sync($request->social_securities, false);
        // } else {
        //     $employee->socilaSecurities()->sync([]);
        // }
        $employeeSocialsecurity=new EmployeeSocialSecurity;
        $employeeSocialsecurity->social_security_id=$request->social_security_id;
        $employeeSocialsecurity->employee_id=$employee->id;
        $employeeSocialsecurity->save();

         Session::flash('success', 'The Employee was successfully saved!');
         return redirect()->route('employees.show', $employee->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee=Employee::findOrFail($id);
    //   dd($employee->scholarships);
        return view('manage.employees.show')->with('employee', $employee);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $nationalities=nationalities();
        $countries=countries();
        $regions=regions();
        $districts=districts();
        $banks=banks();
        $departments=departments();
        $designations=designations();
        $qualifications=qualifications();
        $workstations=workStations();
        $socialSecurities=socialSecurities();
        $employee=Employee::findOrFail($id);
        return view('manage.employees.edit')->with('employee', $employee)->with('nationalities',$nationalities)
        ->with('countries',$countries)
        ->with('regions',$regions)
        ->with('districts',$districts)
        ->with('banks',$banks)
        ->with('departments',$departments)
        ->with('designations',$designations)
        ->with('qualifications',$qualifications)
        ->with('workstations',$workstations)
        ->with('socialSecurities',$socialSecurities);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2|max:100',
            'middle_name' => 'sometimes|nullable|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'marital_status'  => 'required|max:1',
            'gender'  => 'required|max:1',
            'phone_number'=>'sometimes|nullable|min:2|max:20',
            'account_number'=>'sometimes|nullable|min:2|max:50',
            'DOB'  => 'required|date',
            'licence_expiry'  => 'required|date',
            'basic_salary'  => 'required|numeric',
            'status'=>'required|max:20',
            'nationality_id'=>'required|numeric',
            'begin_date'  => 'required|date',
            'end_date'  => 'sometimes|nullable|date',
            'profile_picture'=>'sometimes|nullable|image',
            'bank_id'=>'sometimes|nullable|numeric',
            'department_id'=>'sometimes|nullable|numeric',
            'designation_id'=>'sometimes|nullable|numeric',
            'workStation_id'=>'sometimes|nullable|numeric',
          //  'comment'=>'sometimes|nullable|min:2|max:255'
          ]);
          $employee=Employee::findOrFail($id);
          $employee->first_name=$request->first_name;
          $employee->middle_name=$request->middle_name;
          $employee->last_name=$request->last_name;
          $employee->marital_status=$request->marital_status;
          $employee->gender=$request->gender;
          $employee->phone_number=$request->phone_number;
          $employee->account_number=$request->account_number;
          $employee->DOB=$request->DOB;
          $employee->begin_date=$request->begin_date;
          $employee->end_date=$request->end_date;
          $employee->basic_salary=$request->basic_salary;
          $employee->nationality_id=$request->nationality_id;
          $employee->bank_id=$request->bank_id;
          $employee->department_id=$request->department_id;
          $employee->designation_id=$request->designation_id;
          $employee->workStation_id=$request->workStation_id;
          $employee->licence_expiry=$request->licence_expiry;
          $employee->status=$request->status;  
       //  $employee->comment=$request->comment;
        if ($request->hasFile('profile_photo')) {
            $image=$request->file('profile_photo');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $employee->profile_photo=$filename;
        }

        if ($request->hasFile('licence')){
            $licencename = time().'.'.$request->file('licence')->getClientOriginalExtension();
            
            $request->file('licence')->move(public_path('licences'), $licencename);
            $employee->licence=$licencename;

        }

        if ($request->hasFile('contract')){
            $contractname = time().'.'.$request->file('contract')->getClientOriginalExtension();
            
            $request->file('contract')->move(public_path('contracts'), $contractname);
            $employee->contract=$contractname;

        }
    
         $employee->save();
        
         $employeeSocialsecurity=EmployeeSocialSecurity::where('employee_id',$id)->first();
         $employeeSocialsecurity->social_security_id=$request->social_security_id;
         $employeeSocialsecurity->employee_id=$employee->id;
         $employeeSocialsecurity->save();


         Session::flash('success', 'The Employee was successfully saved!');
         return redirect()->route('employees.show', $employee->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }


    public function left()
    {
        $employees=Employee::where('status','!=','Active')->where('company_id',session('companyId'))->paginate(15);
        return view('manage.employees.index')->with('employees',$employees);
    }

    public function getEmployees($id) {
        $employees = Employee::where("department_id",$id)->pluck("first_name","id");

        return json_encode($employees);

    }



}
