<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;
use Session;

class DesignationController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-designations', ['only' => ['create']]);
        $this->middleware('permission:update-designations',   ['only' => ['edit']]);
        $this->middleware('permission:read-designations',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-designations',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations=Designation::where('company_id',session('companyId'))->paginate(15);
        $departments=departments();
        return view('manage.designation.index')->with('designations', $designations)->with('departments',$departments);
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
            'designation_name' => 'required|min:2|max:255',
            
          ]);

          $designation = new Designation;
         $designation->designation_name=$request->designation_name;
         $designation->company_id=session('companyId');
         $designation->department_id=$request->department_id;
         $designation->save();
         Session::flash('success', 'The Designation was successfully saved!');
         return redirect()->route('designations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $designation=Designation::findOrFail($id);

        $departments=departments();
        
        return view('manage.designation.edit')->with('designation', $designation)->with('departments',$departments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'designation_name' => 'required|min:2|max:255',
            
          ]);

          $designation =Designation::findOrFail($id);
         $designation->designation_name=$request->designation_name;
         $designation->department_id=$request->department_id;
         $designation->save();
         Session::flash('success', 'The Designation was successfully saved!');
         return redirect()->route('designations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        //
    }



    public function getDesignations($id) {
        $designations = Designation::where("department_id",$id)->pluck("designation_name","id");

        return json_encode($designations);

    }
}
