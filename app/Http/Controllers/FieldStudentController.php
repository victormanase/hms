<?php

namespace App\Http\Controllers;

use App\FieldStudent;
use Illuminate\Http\Request;
use Image;
use Session;

class FieldStudentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-fieldstudents', ['only' => ['create']]);
        $this->middleware('permission:update-fieldstudents',   ['only' => ['edit']]);
        $this->middleware('permission:read-fieldstudents',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-fieldstudents',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fieldStudents=FieldStudent::where('company_id',session('companyId'))->paginate(15);;
        return view('manage.fieldStudents.index')->with('fieldStudents',$fieldStudents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $departments=departments();
  
        return view('manage.fieldStudents.create')->with('departments',$departments);
                                             
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
         $fieldStudent = new FieldStudent;
         $fieldStudent->first_name=$request->first_name;
         $fieldStudent->middle_name=$request->middle_name;
         $fieldStudent->last_name=$request->last_name;
         $fieldStudent->gender=$request->gender;
         $fieldStudent->phone_number=$request->phone_number;
         $fieldStudent->start_date=$request->start_date;
         $fieldStudent->end_date=$request->end_date;
         $fieldStudent->department_id=$request->department_id;
         $fieldStudent->comments=$request->comments;
         $fieldStudent->company_id=session('companyId');
         
         $fieldStudent->from=$request->from;         
     
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $fieldStudent->image=$filename;
        }

       
 
         $fieldStudent->save();
         Session::flash('success', 'The Student was successfully saved!');
         return redirect()->route('field-students.show', $fieldStudent->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FieldStudent  $fieldStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fieldStudent=FieldStudent::findOrFail($id);
      
        return view('manage.fieldStudents.show')->with('fieldStudent', $fieldStudent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FieldStudent  $fieldStudent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $fieldStudent=FieldStudent::findOrFail($id);
        $departments=departments();
  
        return view('manage.fieldStudents.edit')->with('departments',$departments)->with('fieldStudent',$fieldStudent);
                                             
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FieldStudent  $fieldStudent
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
         $fieldStudent = FieldStudent::findOrFail($id);
         $fieldStudent->first_name=$request->first_name;
         $fieldStudent->middle_name=$request->middle_name;
         $fieldStudent->last_name=$request->last_name;
         $fieldStudent->gender=$request->gender;
         $fieldStudent->phone_number=$request->phone_number;
         $fieldStudent->start_date=$request->start_date;
         $fieldStudent->end_date=$request->end_date;
         $fieldStudent->department_id=$request->department_id;
         $fieldStudent->comments=$request->comments;
       
         $fieldStudent->from=$request->from;         
     
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $fieldStudent->image=$filename;
        }

       
 
         $fieldStudent->save();
         Session::flash('success', 'The Student was successfully saved!');
         return redirect()->route('field-students.show', $fieldStudent->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FieldStudent  $fieldStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldStudent $fieldStudent)
    {
        //
    }
}
