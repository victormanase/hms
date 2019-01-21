<?php

namespace App\Http\Controllers;

use App\Nationality;
use Illuminate\Http\Request;
use Session;

class NationalityController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-nationalities', ['only' => ['create']]);
        $this->middleware('permission:update-nationalities',   ['only' => ['edit']]);
        $this->middleware('permission:read-nationalities',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-nationalities',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities=Nationality::where('company_id',session('companyId'))->paginate(15);
        return view('manage.nationality.index')->with('nationalities', $nationalities);
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
            'nationality_name' => 'required|min:2|max:255',
            
          ]);

          $nationality = new Nationality;
         $nationality->nationality_name=$request->nationality_name;
         $nationality->company_id=session('companyId');
         $nationality->save();
         Session::flash('success', 'The Nationality was successfully saved!');
         return redirect()->route('nationality.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nationality=Nationality::findOrFail($id);
        
        return view('manage.nationality.edit')->with('nationality', $nationality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'nationality_name' => 'required|min:2|max:255',
            
          ]);

          $nationality =Nationality::findOrFail($id);
         $nationality->nationality_name=$request->nationality_name;
         $nationality->save();
         Session::flash('success', 'The Nationality was successfully saved!');
         return redirect()->route('nationality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nationality $nationality)
    {
        //
    }
}
