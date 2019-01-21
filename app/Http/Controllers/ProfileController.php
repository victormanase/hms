<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-users', ['only' => ['create']]);
        $this->middleware('permission:edit-users',   ['only' => ['edit']]);
        $this->middleware('permission:read-users',   ['only' => ['show', 'index']]);
        $this->middleware('permission:delete-users',   ['only' =>['delete']]);
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

            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'password'=>'required|min:6|max:255'
            
        
        ]);


        $user= new User();

        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->company_id=session('companyId');

        if ($request->hasFile('image')) {
            $image=$request->file('image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $user->image=$filename;
        }

        $user->save();
        $user->roles()->sync($request->roles,false);


        Session::flash('success',"The user was Successfully Added");


        return redirect()->route('users.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user=User::find($id);
        $roles=$user->roles()->get();
        return view('manage.users.show')->with('user', $user)->with('roles',$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::all();
        $checked=$user->roles->pluck('id')->all();
        
        return view('manage.users.edit')->with('user',$user)->with('roles',$roles)->with('checked',$checked);
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
     
  
        $user=User::find($id);




    if (!empty($request->password)) {
        $request->validate([
            
                       
                        'password'=>'required|min:6|max:255'
                        
                    
                    ]);

                    
                    $user->password=Hash::make($request->password);
    } 
    

    $request->validate([
        
                    'name'=>'required|max:255',
                    'email'=>'required|email|unique:users,email,'.$id
                   
                    
                
                ]);

    $user->name=$request->name;
    $user->email=$request->email;
       
                  
          
                  
            
                   
            
                    $user->save();
                    $user->roles()->sync($request->roles,true);
            
                    Session::flash('success',"The user was Successfully Saved");
            
            
                    return redirect()->route('users.show',$id);
            


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
