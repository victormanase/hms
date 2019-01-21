<?php

namespace App\Http\Controllers;

use App\Intern;
use Illuminate\Http\Request;
use Image;
use Session;

class InternController extends Controller


{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-internships', ['only' => ['create']]);
        $this->middleware('permission:update-internships',   ['only' => ['edit']]);
        $this->middleware('permission:read-internships',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-internships',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interns=Intern::where('company_id',session('companyId'))->paginate(15);
        return view('manage.interns.index')->with('interns',$interns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $departments=departments();
  
        return view('manage.interns.create')->with('departments',$departments);
                                             
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
         $intern = new Intern;
         $intern->first_name=$request->first_name;
         $intern->middle_name=$request->middle_name;
         $intern->last_name=$request->last_name;
         $intern->gender=$request->gender;
         $intern->phone_number=$request->phone_number;
         $intern->start_date=$request->start_date;
         $intern->end_date=$request->end_date;
         $intern->department_id=$request->department_id;
         $intern->comments=$request->comments;
         $intern->company_id=session('companyId');
         
         $intern->from=$request->from;         
     
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $intern->image=$filename;
        }

       
 
         $intern->save();
         Session::flash('success', 'The Intern was successfully saved!');
         return redirect()->route('interns.show', $intern->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $intern=Intern::findOrFail($id);
      
        return view('manage.interns.show')->with('intern', $intern);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $intern=Intern::findOrFail($id);
        $departments=departments();
  
        return view('manage.interns.edit')->with('departments',$departments)->with('intern',$intern);
                                             
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Intern  $intern
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
         $intern = Intern::findOrFail($id);
         $intern->first_name=$request->first_name;
         $intern->middle_name=$request->middle_name;
         $intern->last_name=$request->last_name;
         $intern->gender=$request->gender;
         $intern->phone_number=$request->phone_number;
         $intern->start_date=$request->start_date;
         $intern->end_date=$request->end_date;
         $intern->department_id=$request->department_id;
         $intern->comments=$request->comments;
       
         $intern->from=$request->from;         
     
        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $intern->image=$filename;
        }

       
 
         $intern->save();
         Session::flash('success', 'The Intern was successfully saved!');
         return redirect()->route('interns.show', $intern->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Intern  $intern
     * @return \Illuminate\Http\Response
     */
    public function destroy(Intern $intern)
    {
        //
    }
}
