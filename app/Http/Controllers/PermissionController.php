<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-permissions', ['only' => ['create']]);
        $this->middleware('permission:update-permissions',   ['only' => ['edit']]);
        $this->middleware('permission:read-permissions',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-permissions',   ['only' =>['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::all();
        return view('manage.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required|max:255|alpha_dash|unique:roles,name',
            'display_name'=>'required|max:255',
            'description'=>'sometimes|max:255'
        ]);

        $permission=new Permission();

        $permission->display_name=$request->display_name;
        $permission->name=$request->name;
        $permission->description=$request->description;

        $permission->save();


        $request->session()->flash('success', "the permission was succesfully created");

        return redirect()->route('permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission=Permission::findOrFail($id);
        return view('manage.permissions.edit')->with('permission',$permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission=Permission::findOrFail($id);

        $request->validate([
            
                        
                        'display_name'=>'required|max:255',
                        'description'=>'sometimes|max:255',
                        'name'=>'required|max:255|alpha_dash|unique:roles,name,'.$id
                    ]);
            
            
                    $permission->display_name=$request->display_name;
                    $permission->name=$request->name;
                    $permission->description=$request->description;
            
                    $permission->save();

                    $request->session()->flash('success', "the permission was succesfully saved");
            
                    return redirect()->route('permissions.index');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
