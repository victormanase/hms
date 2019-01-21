<?php

namespace App\Http\Controllers;


use App\Application;
use Illuminate\Http\Request;
use App\Http\Requests\StoreApplication;
use Session;

class ApplicationController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-applications', ['only' => ['create']]);
        $this->middleware('permission:update-applications',   ['only' => ['edit']]);
        $this->middleware('permission:read-applications',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-applications',   ['only' =>['delete']]);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplication $request)
    {
     
        $application=new Application();
        $application->applicant_name=$request->applicant_name;
        $application->vacancy_id=$request->vacancy_id;
        $application->status=$request->status;
        $application->company_id=session('companyId');
        $application->created_at=$request->created_at;

        $application->save();
        Session::flash('success', 'The Application was successfully saved!');
        return redirect()->route('applications.show',$application->status);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applications=Application::where('company_id',session('companyId'))->where('status',$id)->get();
        $vacancies=vacancies();
        return view('manage.application.show')->with('applications', $applications)->with('vacancies',$vacancies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application=Application::findOrFail($id);
        $vacancies=vacancies();
        return view('manage.application.edit')->with('application', $application)->with('vacancies',$vacancies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(StoreApplication $request,$id)
    {
        $application=Application::findOrFail($id);
        $application->applicant_name=$request->applicant_name;
        $application->vacancy_id=$request->vacancy_id;
        $application->status=$request->status;
        $application->created_at=$request->created_at;

        $application->save();
        Session::flash('success', 'The Application was successfully saved!');
        return redirect()->route('applications.show',$application->status);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
}
