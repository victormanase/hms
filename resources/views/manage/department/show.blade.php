@extends('new.layout') @section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Department Details </h2>
      <ul class="nav navbar-right panel_toolbox">



        <a href="{{route('departments.edit',$department->id)}}" type="button" class="btn btn-info">Edit Department</a>



      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">


      <ul class="nav nav-pills">
        <li class="active">
          <a data-toggle="pill" href="#home">Overview</a>
        </li>

        <li>
          <a data-toggle="pill" href="#menu2">General Information</a>
        </li>
        <li>
          <a data-toggle="pill" href="#menu3">Other Information</a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <p>
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="count">{{count($department->employees)}}</div>
                  <h3>Employees</h3>
                 
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-institution"></i>
                  </div>
                  <div class="count">{{count($department->designations)}}</div>
                  <h3>Designations</h3>
                  
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-id-card"></i>
                  </div>
                  <div class="count">0</div>
                  <h3>Vacancies</h3>
                  {{--
                  <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-suitcase"></i>
                  </div>
                  <div class="count">0</div>
                  <h3>On Leave</h3>
                  
                </div>
              </div>
            </div>
          </p>



        @if(!empty($employee))
        <div class="col-md-offset-4 col-md-3 col-xs-12 widget widget_tally_box">
                        <div class="x_panel ">
                        <div class="x_title">
                            Supervisor
                  </div>
                          <div class="x_content">

                            <div class="flex">
                              <li>
                                  <img src="{{!empty($employee->profile_photo)?asset('images/'.$employee->profile_photo):""}}" class="img-circle profile_img">
                                </li>
                                
                              </ul>
                            </div>

                            <h3 class="name">{{$employee->first_name}} {{$employee->last_name}}</h3>

                            
                            <table class="table">
                   
                   <tbody>
                       
                     <tr>
                       <th scope="row">Gender</th>
                       <td> @if ($employee->gender==1)
                           <strong> Male</strong>
                       @else
                       <strong> Female</strong>
                       @endif</td>
                       
                     </tr>

                   <tr>
                     <th scope="row">Date Of Birth</th>
                     <td>{{$employee->DOB}}</td>
                     
                   </tr>
                   <tr>
                     <th scope="row">Marital Status</th>
                     <td>@if ($employee->marital_status==1)
                         <strong> Married</strong>
                     @else
                     <strong> Not Married</strong>
                     @endif</td>
                     
                   </tr>

                   <tr>
                     <th scope="row">Phone</th>
                     <td>{{$employee->phone_number}}</td>
                     
                   </tr>

                   <tr>
                     <th scope="row">Nationality</th>
                     <td>{{$employee->nationality->nationality_name}}</td>
                     
                   </tr>

                   {{--  <tr>
                     <th scope="row">Country</th>
                     <td>{{$employee->country->country_name}}</td>
                     
                   </tr>

                   <tr>
                     <th scope="row">Region</th>
                     <td>{{$employee->region->region_name}}</td>
                     
                   </tr>

                   <tr>
                     <th scope="row">District</th>
                     <td>{{$employee->district->district_name}}</td>
                     
                   </tr>  --}}

             
             
             
                 </tbody>
               </table>
                          </div>
                        </div>
                      </div>

                      @endif

                      <div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Employees</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('employees.create')}}" type="button" class="btn btn-default">Register New Employee</a>
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Employee Name</th>
              {{--  <th>Designation</th>  --}}
              <th>Nationality</th>
              <th>Status</th>

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($department->employees as $employee)
                  
              
              <td>#</td>
              <td>
               {{$employee->first_name}}{{" "}}{{$employee->last_name}}
                <br>
                <small>Born {{$employee->DOB}}</small>
              </td>
              {{--  <td>
                  {{$employee->designation->designation_name}}
                </td>  --}}
              <td>
                {{$employee->nationality->nationality_name}}
              </td>
              <td class="project_progress">
              @if($employee->status=="Active")
              <span class="label label-success">{{$employee->status}}</span>
              @else 
              <span class="label label-danger">{{$employee->status}}</span>
              @endif
              </td>

              
             
              <td>
              <a href="{{route('makeSupervisor',[$department->id,$employee->id])}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Make Supervisor"><i class="fa fa-star"></i></a>
                <a href="{{route('employees.show',$employee->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
              
            
          </tbody>
        </table>
       
      </div>
    </div>
  </div>
</div>

                      </div>



          <div id="menu2" class="tab-pane fade">
            <div class="x_content">

              <table class="table">

                


                </tbody>
              </table>

            </div>
          </div>
        </div>





      </div>
    </div>



  </div>








  @endsection