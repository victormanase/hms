<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Notifications\DepartmentAdded;
use Notification;
use App\Employee;
use Yajra\Datatables\Datatables;

class DepartmentController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-departments', ['only' => ['create']]);
        $this->middleware('permission:update-departments',   ['only' => ['edit']]);
        $this->middleware('permission:read-departments',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-departments',   ['only' =>['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::where('company_id',session('companyId'))->paginate(15);
        return view('manage.department.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request);
        $this->validate($request, [
            'department_name' => 'required|min:2|max:255',
            
          ]);
          $user =User::find(1);
          $department = new Department;
         $department->department_name=$request->department_name;
         $department->company_id=session('companyId');
         $department->save();
       
        // //  Notification::send(User::all(), new DepartmentAdded($department));
         
        //  $user = User::find(1);

        //  foreach ($user->notifications as $notification) {
        //       dd($notification->type);
        //  }


         Session::flash('success', 'The Department was successfully saved!');
         return redirect()->route('departments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department=Department::findOrFail($id);
        $employee=Employee::find($department->supervisor_id);
        return view('manage.department.show')->with('department',$department)->with('employee',$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department=Department::findOrFail($id);
        
        return view('manage.department.edit')->with('department', $department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'department_name' => 'required|min:2|max:255',
            
          ]);

          $department =Department::findOrFail($id);
         $department->department_name=$request->department_name;
         $department->save();
         Session::flash('success', 'The Department was successfully saved!');
         return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }

    public function anyData()
{
    return Datatables::of(Department::query())->make(true);
}

public function getIndex()
    {
        return view('manage.department.index');
    }

    public function makeSupervisor($department_id,$employee_id)
    {
        $department=Department::findOrFail($department_id);

        $department->supervisor_id=$employee_id;
        $department->save();

        return redirect()->route('departments.show',$department_id);
    }
}
