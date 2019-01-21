<?php

namespace App\Http\Controllers;

use App\Vacancy;
use Illuminate\Http\Request;
use Session;


class VacancyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-vacancies', ['only' => ['create']]);
        $this->middleware('permission:update-vacancies',   ['only' => ['edit']]);
        $this->middleware('permission:read-vacancies',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-vacancies',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies=Vacancy::where('company_id',session('companyId'))->paginate(15);
        return view('manage.vacancy.index')->with('vacancies', $vacancies);
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
    
        $this->validate($request, [
            'position_name' => 'required|min:2|max:255',
            'number_of_positions' => 'required|numeric',
            'last_application_date' => 'required|date',
          ]);


          $vacancy=new Vacancy;
          $vacancy->position_name=$request->position_name;
         $vacancy->number_of_positions=$request->number_of_positions;
         $vacancy->last_application_date=$request->last_application_date;
         $vacancy->company_id=session('companyId');

         $vacancy->save();

         Session::flash('success', 'The Vacancy was successfully saved!');
         return redirect()->route('vacancies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy=Vacancy::findOrFail($id);
        return view('manage.vacancy.edit')->with('vacancy', $vacancy);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'position_name' => 'required|min:2|max:255',
            'number_of_positions' => 'required|numeric',
            'last_application_date' => 'required|date',
          ]);


          $vacancy=Vacancy::findOrFail($id);
          $vacancy->position_name=$request->position_name;
         $vacancy->number_of_positions=$request->number_of_positions;
         $vacancy->last_application_date=$request->last_application_date;

         $vacancy->save();

         Session::flash('success', 'The Vacancy was successfully saved!');
         return redirect()->route('vacancies.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
