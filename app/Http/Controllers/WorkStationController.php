<?php

namespace App\Http\Controllers;

use App\WorkStation;
use Illuminate\Http\Request;
use Session;

class WorkStationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-workstations', ['only' => ['create']]);
        $this->middleware('permission:update-workstations',   ['only' => ['edit']]);
        $this->middleware('permission:read-workstations',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-workstations',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workStations=WorkStation::where('company_id',session('companyId'))->paginate(15);
        return view('manage.workStation.index')->with('workStations', $workStations);
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
            
          ]);

          $workStation = new WorkStation;
         $workStation->name=$request->name;
         $workStation->company_id=session('companyId');
         $workStation->save();
         Session::flash('success', 'The Work Station was successfully saved!');
         return redirect()->route('work-stations.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkStation  $workStation
     * @return \Illuminate\Http\Response
     */
    public function show(WorkStation $workStation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkStation  $workStation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workStation=WorkStation::findOrFail($id);
        
        return view('manage.workStation.edit')->with('workStation', $workStation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkStation  $workStation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id    )
    {
      

        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            
          ]);

          $workStation =WorkStation::findOrFail($id);
         $workStation->name=$request->name;
         $workStation->save();
         Session::flash('success', 'The WorkStation was successfully saved!');
         return redirect()->route('work-stations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkStation  $workStation
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkStation $workStation)
    {
        //
    }
}
