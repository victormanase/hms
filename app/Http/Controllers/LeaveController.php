<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;
use Session;
use App\User;
use App\Role;
use DB;

use App\Notifications\LeaveRequest;
use Notification;

class LeaveController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('permission:create-leavetypes', ['only' => ['create']]);
        // $this->middleware('permission:update-leavetypes',   ['only' => ['edit']]);
        // $this->middleware('permission:read-leavetypes',   ['only' => ['show', 'index']]);
        // $this->middleware('permission:delete-leavetypes',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $leave = new Leave;
        $this->validate($request, [
         
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|min:2|max:255',
          ]);

              $leave->employee_id=$request->employee_id;
              $leave->status='1';
              $leave->start_date=$request->start_date;
              $leave->end_date=$request->end_date;
              $leave->leave_type_id=$request->leaveType_id;
              $leave->company_id=session('companyId');
  
         $leave->save();
        $user=User::where('notifiable','1')->get();
    

        Notification::send($user,new LeaveRequest($leave));
         Session::flash('success', 'The Leave was successfully requested!');




         return redirect()->route('leaves.show','1');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $employees=employees();
        $leaveTypes=leaveTypes();

        if ($id==='0') {
            $leaves=Leave::where('company_id',session('companyId'))->get();
          
        } else {
            $leaves=Leave::where('company_id',session('companyId'))->where('status',$id)->get();
           
        }

        return view('manage.leaves.show')->with('leaves',$leaves)->with('employees',$employees)->with('leaveTypes',$leaveTypes);
        
     
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave=Leave::findOrFail($id);
        $employees=employees();
        $leaveTypes=leaveTypes();
        
        return view('manage.leaves.edit')->with('leaveTypes', $leaveTypes)->with('employees',$employees)->with('leave',$leave);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      

         
        $leave =Leave::findOrFail($id);
        $this->validate($request, [
         
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
          ]);

              $leave->employee_id=$request->employee_id;
              $leave->status='1';
              $leave->start_date=$request->start_date;
              $leave->end_date=$request->end_date;
              $leave->leave_type_id=$request->leaveType_id;
             
  
         $leave->save();
         Session::flash('success', 'Leave successfully saved!');

         return redirect()->route('leaves.show','1');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveType)
    {
        //
    }

    public function changeStatus($id,$leaveId)
    {
        $leave=Leave::findOrFail($leaveId);

        $leave->status=$id;

        $leave->save();

        $user=User::where('notifiable','1')->get();
    

   
        Session::flash('success', 'Status was successfully changed!');

         return redirect()->route('leaves.show', $id);
    }


    public function viewLeave($id)
    {

        $leaveTypes=leaveTypes();
     //   dd($leaveTypes);
        if ($id==='0') {
            $leaves=Leave::where('employee_id',session('employeeId'))->get();    
        } else {
            $leaves=Leave::where('employee_id',session('employeeId'))->where('status',$id)->get();
        }
        return view('manage.leaves.show2')->with('leaves',$leaves)->with('leaveTypes',$leaveTypes);

    }


    public function requestLeave(Request $request)
    {
        $leave = new Leave;
        $this->validate($request, [
         
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|min:2|max:255',
          ]);

        
            $leave->employee_id=session('employeeId');
            $leave->status='1';
            $leave->start_date=$request->start_date;
            $leave->end_date=$request->end_date;
            $leave->leave_type_id=$request->leaveType_id;
            $leave->company_id=session('companyId');

         $leave->save();
         $user=User::where('notifiable','1')->get();
    

         Notification::send($user,new LeaveRequest($leave));
         Session::flash('success', 'Leave requested Successfully!');




         return redirect()->route('manage.employee.leave','1');

    }



    public function updateLeaveRequest(Request $request,$id)
    {
      

         
        $leave =Leave::findOrFail($id);
        $this->validate($request, [
         
            'start_date' => 'required|min:2|max:255',
            'end_date' => 'required|min:2|max:255',
          ]);
          $leave->employee_id=session('employeeId');
          $leave->status='1';
          $leave->start_date=$request->start_date;
          $leave->end_date=$request->end_date;
          $leave->leave_type_id=$request->leaveType_id;
          
  
         $leave->save();

         Session::flash('success', 'Leave successfully Requested!');

         return redirect()->route('manage.employee.leave','1');


    }



    public function editLeave($id)
    {
        
        $leaveTypes=leaveTypes();
        $leave=Leave::findOrFail($id);
        if ($id==='0') {
            $leaves=Leave::where('company_id',session('companyId'))->get();
          
        } else {
            $leaves=Leave::where('company_id',session('companyId'))->where('status',$id)->get();
           
        }

        return view('manage.leaves.edit2')->with('leaves',$leaves)->with('leaveTypes',$leaveTypes)->with('leave',$leave);
        
     
    }


   
}
