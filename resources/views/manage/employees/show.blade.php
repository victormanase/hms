

@extends('new.layout')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>{{$employee->first_name}}{{" "}}{{$employee->middle_name}}{{" "}}{{$employee->last_name}} Details </h2>
      <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('employees.edit',$employee->id)}}" type="button" class="btn btn-info">Edit Employee</a>

        
       
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-xs-3">
        <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Personal Information</a>
          </li>
          <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true">Employement Information</a>
          </li>
          <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Bank Information</a>
          </li>
          <li class=""><a href="#socialSecurity" data-toggle="tab" aria-expanded="false">Social Security Information</a>
          </li>
          <li class=""><a href="#scholarships" data-toggle="tab" aria-expanded="false">Scholarship Information</a>
          </li>
          <li class=""><a href="#loan" data-toggle="tab" aria-expanded="false">Loan Information</a>
          </li>
          <li class=""><a href="#training" data-toggle="tab" aria-expanded="false">Training Information</a>
          </li>
        </ul>
      </div>

      <div class="col-xs-9">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home">

              <div class="x_content">

                  <table class="table">
                   
                      <tbody>
                          <tr>
                              <th scope="row">Picture</th>
                              <td><img src="{{!empty($employee->profile_photo)?asset('images/'.$employee->profile_photo):""}}" class="media-object" style="width:150px"></td>
                              
                            </tr>
                        <tr>
                          <th scope="row">Employee Name</th>
                          <td>{{$employee->first_name}}{{" "}}{{$employee->middle_name}}{{" "}}{{$employee->last_name}}</td>
                          
                        </tr>
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
            
        
          <div class="tab-pane" id="profile"><div class="col-md-12 col-sm-12 col-xs-12">
          
         
              <div class="x_content">

                <table class="table">
                 
                  <tbody>
                     
                    <tr>
                      <th scope="row">Department Name</th>
                      <td>{{$employee->department->department_name}}</td>
                      
                    </tr>
                   

                  
                    <tr>
                      <th scope="row">Designation</th>
                      <td>{{$employee->designation->designation_name}}</td>
                      
                    </tr>

                    {{--  <tr>
                      <th scope="row">WorkStation</th>
                      <td>{{$employee->workStation->name}}</td>
                      
                    </tr>  --}}

                    <tr>
                      <th scope="row">Status</th>
                      <td> @if($employee->status=="Active")
              <span class="label label-success">{{$employee->status}}</span>
              @else 
              <span class="label label-danger">{{$employee->status}}</span>
              @endif</td>
                      
                    </tr>

                    {{--  <tr>
                      <th scope="row">Qualifications</th>
                      <td>{{$employee->qualifications->qualification_name}}</td>
                      
                    </tr>  --}}

                    <tr>
                      <th scope="row">license</th>
                      <td>@if (!empty($employee->licence))
                        <a href="{{asset('licences/'.$employee->licence)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                      @else
                      <span class="label label-warning">No Licence</span>  
                      @endif</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">License Expiry Date</th>
                      <td>{{$employee->licence_expiry}}</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Contract</th>
                      <td>@if (!empty($employee->contract))
                        <a href="{{asset('contracts/'.$employee->contract)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                      @else
                      <span class="label label-warning">No Contract</span>  
                      @endif</td>
                      
                    </tr>

                    <tr>
                        <th scope="row">Contract Begin</th>
                        <td>{{$employee->begin_date}}</td>
                        
                      </tr>

                      <tr>
                          <th scope="row">Contract End</th>
                          <td>{{$employee->end_date}}</td>
                          
                        </tr>
              
              
                  </tbody>
                </table>

              </div>
          
          </div></div>
          <div class="tab-pane" id="messages"> <div class="x_content">

              <table class="table">
               
                <tbody>
                    <tr>
                        <th scope="row">Bank Name</th>
                        <td>{{$employee->bank->bank_name}}</td>
                        
                      </tr>
                  <tr>
                    <th scope="row">Branch</th>
                    <td>{{$employee->branch}}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Account Number</th>
                    <td>{{$employee->account_number}}</td>
                    
                  </tr>

                 
            
            
                </tbody>
              </table>

            </div>
        
        </div>
        <div class="tab-pane" id="socialSecurity"> <div class="x_content">

          <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  
                </tr>
              </thead>
              <tbody>

              
                    
               
                <tr>
                  <th scope="row"></th>
                  <td>{{App\SocialSecurity::find($employee->socialSecurity->social_security_id)->name}}</td>
                  

                </tr>

              
                
              </tbody>
            </table>

        </div>
    
    </div>
      
        <div class="tab-pane" id="scholarships"> <div class="x_content">

            <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Course</th>
                    <th>University</th>
                    <th>Letter</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($employee->scholarships as $scholarship)
                      
                 
                  <tr>
                    <th scope="row"></th>
                    <td>{{$scholarship->course}}</td>
                    <td>{{$scholarship->university}}</td>
                    <td>@if (!empty($scholarship->agreement_letter))
                        <a href="{{asset('agreementLetters/'.$scholarship->agreement_letter)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                      @else
                      <span class="label label-warning">No Letter</span>  
                      @endif</td>
                   <td>{{$scholarship->begin_date}}</td>
                   <td>{{$scholarship->end_date}}</td>
                   <td>
                      <a href="{{route('scholarships.edit',$scholarship->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                      <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
                   </td>

                  </tr>

                  @endforeach
                  
                </tbody>
              </table>

          </div>
      
      </div>


      <div class="tab-pane" id="loan"> <div class="x_content">

        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Loan Name</th>
            
              <th>Amount</th>
              <th>Rate</th>
              <th>Paid</th>
              <th>Balance</th>
              
              
              
             
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employee->loans as $loan)
                
           
            <tr>
              <td>#</td>
              <td>
                <a>{{$loan->name}}</a>
              </td>
             
              <td>
                <a>{{$loan->amount}}</a>
              </td>
              <td>
                <a>{{$loan->rate}}</a>
              </td>
              <td>
                <a>{{$loan->paid}}</a>
              </td>

              <td>
                <a>{{$loan->balance}}</a>
              </td>
             
              <td>
               
                <a href="{{route('loans.edit',$loan->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
      </div>
  
  </div>
      
      
      
      </div></div>
          
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>




  @endsection




  
