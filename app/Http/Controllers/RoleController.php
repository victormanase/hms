<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Auth;
use Session;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::user()->hasRole('superadministrator')) {
            $roles=Role::where('company_id',session('companyId'))->orWhere('company_id',null)->get();
        } else {
            $roles=roles();
        }
        
        

       

       return view('manage.roles.index')->with('roles', $roles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       $data=allPermissions();
       $permissions=Permission::all();
        return view('manage.roles.create',$data)->with('permissions',$permissions);
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

        $role=new Role();

        $role->display_name=$request->display_name;
        $role->name=$request->name;
        $role->description=$request->description;
          
        $role->company_id=session('companyId');

        $role->save();

        $role->permissions()->sync($request->permissions,false);


        $request->session()->flash('success', "The role was succesfully created");

        return redirect()->route('roles.index');
        
        




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Role::findOrFail($id);
        $permissions=$role->permissions()->get();
        return view('manage.roles.show')->with('role', $role)->with('permissions',$permissions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::where('id',$id)->with('permissions')->first();
        //dd($role);
        $permissions=Permission::all();
       $data=allPermissions();

 $checked=$role->permissions->pluck('id')->all();
  $data['checkedoverviews']=$role->permissions->where('display_name','overview')->pluck('id')->all();
  $data['checkeddepartments']=$role->permissions->where('display_name','departments')->pluck('id')->all();
  $data['checkeddesignations']=$role->permissions->where('display_name','designations')->pluck('id')->all();
  $data['checkedsalaryscales']=$role->permissions->where('display_name','salaryscales')->pluck('id')->all();
  $data['checkedbanks']=$role->permissions->where('display_name','banks')->pluck('id')->all();
  $data['checkednationalities']=$role->permissions->where('display_name','nationalities')->pluck('id')->all();
  $data['checkedleavetypes']=$role->permissions->where('display_name','leavetypes')->pluck('id')->all();
  $data['checkedqualifications']=$role->permissions->where('display_name','qualifications')->pluck('id')->all();
  $data['checkedworkstations']=$role->permissions->where('display_name','workstations')->pluck('id')->all();
  $data['checkedemployees']=$role->permissions->where('display_name','employees')->pluck('id')->all();
  $data['checkedvacancies']=$role->permissions->where('display_name','vacancies')->pluck('id')->all();
  $data['checkedapplications']=$role->permissions->where('display_name','applications')->pluck('id')->all();
  $data['checkedfieldstudents']=$role->permissions->where('display_name','fieldstudents')->pluck('id')->all();
  $data['checkedinternships']=$role->permissions->where('display_name','internships')->pluck('id')->all();
  $data['checkedvolunteers']=$role->permissions->where('display_name','volunteers')->pluck('id')->all();
  $data['checkedscholarships']=$role->permissions->where('display_name','scholarships')->pluck('id')->all();
  $data['checkedroles']=$role->permissions->where('display_name','roles')->pluck('id')->all();
  $data['checkedusers']=$role->permissions->where('display_name','users')->pluck('id')->all();
  $data['checkedleaves']=$role->permissions->where('display_name','leaves')->pluck('id')->all();
  $data['checkedbasicpermissions']=$role->permissions->where('display_name','basic_permission')->pluck('id')->all();

  //dd($data['checkedbasicpermissions']);
  




  //dd(  [$checked=$role->permissions->pluck('id')->all(),$permissions]);
       return view('manage.roles.edit',$data)->with('role', $role)->with('permissions',$permissions)->with('checked',$checked);
                    
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
         $role=Role::findOrFail($id);

        $request->validate([
            
                        
                        'display_name'=>'required|max:255',
                        'description'=>'sometimes|max:255',
                        'name'=>'required|max:255|alpha_dash|unique:roles,name,'.$id
                    ]);
            
            
                    $role->display_name=$request->display_name;
                    $role->name=$request->name;
                    $role->description=$request->description;
            
                    $role->save();
            
                    $role->permissions()->sync($request->permissions,true);
            
            
                    $request->session()->flash('success', "Role succesfully saved");
            
                    return redirect()->route('roles.index');
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
