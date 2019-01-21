<?php

namespace App\Http\Controllers;

use App\LeaveType;
use Illuminate\Http\Request;
use Session;

class LeaveTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-leavetypes', ['only' => ['create']]);
        $this->middleware('permission:update-leavetypes',   ['only' => ['edit']]);
        $this->middleware('permission:read-leavetypes',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-leavetypes',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveTypes=LeaveType::where('company_id',session('companyId'))->paginate(15);
    
        return view('manage.leaveType.index')->with('leaveTypes', $leaveTypes);

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
            'name' => 'required|min:2|max:255',
            'duration' => 'required|min:2|max:255',
          ]);

          $leaveType = new LeaveType;
         $leaveType->name=$request->name;
        $leaveType->duration=$request->duration;
         $leaveType->company_id=session('companyId');
         $leaveType->save();
         Session::flash('success', 'The Leave Type was successfully saved!');
         return redirect()->route('leave-types.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveType $leaveType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leaveType=LeaveType::findOrFail($id);
        
        return view('manage.leaveType.edit')->with('leaveType', $leaveType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'duration' => 'required|min:2|max:255',
            
          ]);

          $leaveType =LeaveType::findOrFail($id);
         $leaveType->name=$request->name;
         $leaveType->duration=$request->duration;
         $leaveType->save();
         Session::flash('success', 'The Leave Type was successfully saved!');
         return redirect()->route('leave-types.index');
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
}
