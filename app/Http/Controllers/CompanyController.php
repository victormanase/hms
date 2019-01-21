<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Session;
use Image;
use Storage;
use Illuminate\Validation\Rule;
use Auth;
use Carbon\Carbon;
use App\User;
use Spatie\Activitylog\Models\Activity;


class CompanyController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     // $this->middleware('role:superadministrator', ['only'=>['create','index','delete','show','edit','update']]);
    //    //dd(Auth::user());
    //     $this->middleware('permission:update-overview',   ['only' => ['edit','update']]);
    //      $this->middleware('permission:read-overview',   ['only' => ['show']]);
       
    
    // }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(User::whereRoleIs('superadministrator')->get());
        $companies=Company::paginate(10);
        return view('manage.companiesAvailable.index')->with('companies',$companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        
        return view('manage.companiesAvailable.create');
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
            'hq'  => 'sometimes|nullable|min:2|max:255',
            'email'  => 'required|email|unique:companies,email|min:5|max:255|',
            'phone'=>'sometimes|nullable|min:2|max:20',
            'fax'=>'sometimes|nullable|min:2|max:20',
            'postal_address'  => 'sometimes|nullable|min:2|max:255',
            'physical_address'  => 'min:2|max:255',
            'address1'  => 'sometimes|nullable|min:2|max:255',
            'address2'  => 'sometimes|nullable|min:2|max:255',
            'address3'  => 'sometimes|nullable|min:2|max:255',
            'founded'  => 'numeric|min:1800|max:2019',
            'website'=>'sometimes|nullable|min:2|max:255',
            'founder'=>'sometimes|nullable|min:2|max:255',
            'industry_type'=>'sometimes|nullable|min:2|max:255',
            'total_employees'=>'sometimes|nullable|numeric|min:1|max:99999999',
            'mission'=>'sometimes|nullable|min:2|max:255',
            'logo'=>'sometimes|nullable|image',
            'vision'=>'sometimes|nullable|min:2|max:255',
            'value'=>'sometimes|nullable|min:2|max:255',
            'description'=>'sometimes|nullable|min:2|max:255'
          ]);
         $company = new Company;
         $company->name=$request->name;
         $company->hq=$request->hq;
         $company->email=$request->email;
         $company->phone=$request->phone;
         $company->fax=$request->fax;
         $company->postal_address=$request->postal_address;
         $company->physical_address=$request->physical_address;
         $company->address1=$request->address1;
         $company->address2=$request->address2;
         $company->address3=$request->address3;
         $company->founder=$request->founder;
         $company->founded=$request->founded;
         $company->website=$request->website;
         $company->industry_type=$request->industry_type;
         $company->total_employees=$request->total_employees;
         $company->mission=$request->mission;
         $company->vision=$request->vision;
         $company->value=$request->value;
         $company->description=$request->description;
        if ($request->hasFile('logo')) {
            $image=$request->file('logo');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $company->logo=$filename;
        }
    
         $company->save();
         Session::flash('success', 'The Company was successfully saved!');
         return redirect()->route('companies.show', $company->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    //     if ($id!=session('companyId')&&!Auth::user()->hasRole('superadministrator')) {
    //         return redirect()->route('access-denied');
    //  }
        
    
        $company=Company::findOrFail($id);
        $leaveCount=$company->leaves->where('start_date','<',Carbon::now())->where('end_date','>',Carbon::now())->where('status','=','2')->count();
      
        $data['department_count']=count(departments());
        $data['designation_count']=count(designations());
        $data['salaryscale_count']=count(salaryScales());
        $data['bank_count']=count(banks());
        $data['nationality_count']=count(nationalities());
        $data['leavetype_count']=count(leaveTypes());
        $data['qualification_count']=count(qualifications());
        $data['workstation_count']=count(workStations());
        $data['taxtable_count']=count(taxTable());
        $data['socialsecurity_count']=count(socialSecurities());
        
      

        $percentage=0;
        $count=0;

    foreach ($data as $datum) { 
       // dd($datum);
        if($datum!=0){
            $percentage=$percentage+1;
        }
        $count=$count+1;
    }
    
    $data['percentage']=($percentage/$count)*100;
    $data['count']=$count;


        return view('manage.companiesAvailable.show',$data)->with('company', $company)->with('leaveCount',$leaveCount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if ($id!=session('companyId')&&!Auth::user()->hasRole('superadministrator')) {
            return redirect()->route('access-denied');
     }

        $company=Company::findOrFail($id);
        return view('manage.companiesAvailable.edit')->with('company', $company);
        
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
         if ($id!=session('companyId')) {
            return redirect()->route('access-denied');
     }
        
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'hq'  => 'sometimes|nullable|min:2|max:255',
            'email'  => "required|email|unique:companies,email,$id",
            'phone'=>'sometimes|nullable|min:2|max:20',
            'fax'=>'sometimes|nullable|min:2|max:20',
            'postal_address'  => 'sometimes|nullable|min:2|max:255',
            'physical_address'  => 'min:2|max:255',
            'address1'  => 'sometimes|nullable|min:2|max:255',
            'address2'  => 'sometimes|nullable|min:2|max:255',
            'address3'  => 'sometimes|nullable|min:2|max:255',
            'founded'  => 'numeric|min:1800|max:2019',
            'website'=>'sometimes|nullable|min:2|max:255',
            'founder'=>'sometimes|nullable|min:2|max:255',
            'industry_type'=>'sometimes|nullable|min:2|max:255',
            'total_employees'=>'sometimes|nullable|numeric|min:1|max:99999999',
            'mission'=>'sometimes|nullable|min:2|max:255',
            'logo'=>'sometimes|nullable|image',
            'vision'=>'sometimes|nullable|min:2|max:255',
            'value'=>'sometimes|nullable|min:2|max:255',
            'description'=>'sometimes|nullable|min:2|max:255'
          ]);
         $company = Company::findOrFail($id);
         $company->name=$request->name;
         $company->hq=$request->hq;
         $company->email=$request->email;
         $company->phone=$request->phone;
         $company->fax=$request->fax;
         $company->postal_address=$request->postal_address;
         $company->physical_address=$request->physical_address;
         $company->address1=$request->address1;
         $company->address2=$request->address2;
         $company->address3=$request->address3;
         $company->founder=$request->founder;
         $company->founded=$request->founded;
         $company->website=$request->website;
         $company->industry_type=$request->industry_type;
         $company->total_employees=$request->total_employees;
         $company->mission=$request->mission;
         $company->vision=$request->vision;
         $company->value=$request->value;
         $company->description=$request->description;
        if ($request->hasFile('logo')) {
            $image=$request->file('logo');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400, 400)->save($location);
            $company->logo=$filename;
        }
    
         $company->save();
         Session::flash('success', 'The Company was successfully saved!');
         return redirect()->route('companies.show', $company->id);
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
