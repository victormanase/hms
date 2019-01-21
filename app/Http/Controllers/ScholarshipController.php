<?php

namespace App\Http\Controllers;

use App\Scholarship;
use Session;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-scholarships', ['only' => ['create']]);
        $this->middleware('permission:update-scholarships',   ['only' => ['edit']]);
        $this->middleware('permission:read-scholarships',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-scholarships',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships=Scholarship::where('company_id',session('companyId'))->paginate(15);
        return view('manage.scholarships.index')->with('scholarships',$scholarships);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees=active_employees();
        return view('manage.scholarships.create')->with('employees', $employees);
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
            'employee_id' => 'required',
            'university' => 'required|min:2|max:255',
            'course' => 'required|min:2|max:255',

            'start_date'  => 'required|date',
            'end_date'  => 'sometimes|nullable|date',
            'agreement'=>'sometimes|nullable',
           
          ]);
         $scholarship = new Scholarship;
         $scholarship->employee_id=$request->employee_id;
         $scholarship->university=$request->university;
         $scholarship->course=$request->course;
         $scholarship->begin_date=$request->start_date;
         $scholarship->end_date=$request->end_date;
        
         $scholarship->company_id=session('companyId');
         
        
         if ($request->hasFile('agreement_letter')){
            $lettername = time().'.'.$request->file('agreement_letter')->getClientOriginalExtension();
           
            $request->file('agreement_letter')->move(public_path('agreementLetters'), $lettername);
            $scholarship->agreement_letter=$lettername;

        }
       
 
         $scholarship->save();
         Session::flash('success', 'The scholarship was successfully saved!');
         return redirect()->route('scholarships.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('employees.show', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scholarship=Scholarship::findOrFail($id);
        $employees=employees();
        return view('manage.scholarships.edit')->with('scholarship',$scholarship)->with('employees', $employees);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'employee_id' => 'required',
            'university' => 'required|min:2|max:255',
            'course' => 'required|min:2|max:255',
            'start_date'  => 'required|date',
            'end_date'  => 'sometimes|nullable|date',
            'agreement'=>'sometimes|nullable',
           
          ]);
         $scholarship =Scholarship::findOrFail($id);
         $scholarship->employee_id=$request->employee_id;
         $scholarship->university=$request->university;
         $scholarship->course=$request->course;
         $scholarship->begin_date=$request->start_date;
         $scholarship->end_date=$request->end_date;
        
        
         
        
         if ($request->hasFile('agreement_letter')){
            $lettername = time().'.'.$request->file('agreement_letter')->getClientOriginalExtension();
           
            $request->file('agreement_letter')->move(public_path('agreementLetters'), $lettername);
            $scholarship->agreement_letter=$lettername;

        }
       
 
         $scholarship->save();
         Session::flash('success', 'The scholarship was successfully saved!');
         return redirect()->route('scholarships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scholarship  $scholarship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        //
    }
}
