<?php

namespace App\Http\Controllers;

use App\Volunteer;
use Illuminate\Http\Request;
use Image;
use Session;

class VolunteerController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-volunteers', ['only' => ['create']]);
        $this->middleware('permission:update-volunteers',   ['only' => ['edit']]);
        $this->middleware('permission:read-volunteers',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-volunteers',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteers=Volunteer::where('company_id',session('companyId'))->paginate(15);
        return view('manage.volunteers.index')->with('volunteers',$volunteers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $departments=departments();
  
        return view('manage.volunteers.create')->with('departments',$departments);
                                             
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
            'middle_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'gender'  => 'required|max:1',
            'phone_number'=>'sometimes|nullable|min:2|max:20',
            'from'=>'required|min:2|max:255',
            'start_date'  => 'required|date',
            'end_date'  => 'sometimes|nullable|date',
            'profile_picture'=>'sometimes|nullable|image',
            'department_id'=>'sometimes|nullable|numeric',
            'comments'=>'sometimes|nullable|min:2|max:255'
          ]);
         $volunteer = new Volunteer;
         $volunteer->first_name=$request->first_name;
         $volunteer->middle_name=$request->middle_name;
         $volunteer->last_name=$request->last_name;
         $volunteer->gender=$request->gender;
         $volunteer->phone_number=$request->phone_number;
         $volunteer->start_date=$request->start_date;
         $volunteer->end_date=$request->end_date;
         $volunteer->department_id=$request->department_id;
         $volunteer->comments=$request->comments;
         $volunteer->company_id=session('companyId');
         
         $volunteer->from=$request->from;         
     
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $volunteer->image=$filename;
        }

       
 
         $volunteer->save();
         Session::flash('success', 'The Volunteer was successfully saved!');
         return redirect()->route('volunteers.show', $volunteer->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteer=Volunteer::findOrFail($id);
      
        return view('manage.volunteers.show')->with('volunteer', $volunteer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $volunteer=Volunteer::findOrFail($id);
        $departments=departments();
  
        return view('manage.volunteers.edit')->with('departments',$departments)->with('volunteer',$volunteer);
                                             
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|min:2|max:100',
            'middle_name' => 'required|min:2|max:100',
            'last_name' => 'required|min:2|max:100',
            'gender'  => 'required|max:1',
            'phone_number'=>'sometimes|nullable|min:2|max:20',
            'from'=>'required|min:2|max:255',
            'start_date'  => 'required|date',
            'end_date'  => 'sometimes|nullable|date',
            'profile_picture'=>'sometimes|nullable|image',
            'department_id'=>'sometimes|nullable|numeric',
            'comments'=>'sometimes|nullable|min:2|max:255'
          ]);
         $volunteer = Volunteer::findOrFail($id);
         $volunteer->first_name=$request->first_name;
         $volunteer->middle_name=$request->middle_name;
         $volunteer->last_name=$request->last_name;
         $volunteer->gender=$request->gender;
         $volunteer->phone_number=$request->phone_number;
         $volunteer->start_date=$request->start_date;
         $volunteer->end_date=$request->end_date;
         $volunteer->department_id=$request->department_id;
         $volunteer->comments=$request->comments;
       
         $volunteer->from=$request->from;         
     
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $volunteer->image=$filename;
        }

       
 
         $volunteer->save();
         Session::flash('success', 'The Volunteer was successfully saved!');
         return redirect()->route('volunteers.show', $volunteer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }
}
