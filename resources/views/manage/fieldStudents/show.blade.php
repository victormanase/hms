

@extends('new.layout')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Student Details </h2>
      <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('field-students.edit',$fieldStudent->id)}}" type="button" class="btn btn-info">Edit Employee</a>

        
       
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-xs-3">
        <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Student Information</a>
          </li>
          <li class=""><a href="#" data-toggle="tab" aria-expanded="true">otherInformation</a>
          </li>
          <li class=""><a href="#" data-toggle="tab" aria-expanded="false">other Information</a>
          </li>
          <li class=""><a href="#" data-toggle="tab" aria-expanded="false">Other</a>
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
                              <td><img src="{{!empty($fieldStudent->image)?asset('images/'.$fieldStudent->image):""}}" class="media-object" style="width:150px"></td>
                              
                            </tr>
                        <tr>
                          <th scope="row">Student Name</th>
                          <td>{{$fieldStudent->first_name}}{{" "}}{{$fieldStudent->last_name}}</td>
                          
                        </tr>
                        <tr>
                          <th scope="row">Gender</th>
                          <td> @if ($fieldStudent->gender==1)
                              <strong> Male</strong>
                          @else
                          <strong> Female</strong>
                          @endif</td>
                          
                        </tr>
  
                      <tr>
                        <th scope="row">From</th>
                        <td>{{$fieldStudent->from}}</td>
                        
                      </tr>
                      
  
                      <tr>
                        <th scope="row">Phone</th>
                        <td>{{$fieldStudent->phone_number}}</td>
                        
                      </tr>
  
                      <tr>
                        <th scope="row">Department</th>
                        <td>{{$fieldStudent->department->department_name}}</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">Start Date</th>
                        <td>{{$fieldStudent->start_date}}</td>
                        
                      </tr>



                      <tr>
                        <th scope="row">End Date</th>
                        <td>{{$fieldStudent->end_date}}</td>
                        
                      </tr>

                      <tr>
                        <th scope="row">Comments</th>
                        <td>{{$fieldStudent->comments}}</td>
                        
                      </tr>
  
                
                
                    </tbody>
                  </table>
  
                </div>
            
            </div>
            
        
          <div class="tab-pane" id="profile"><div class="col-md-12 col-sm-12 col-xs-12">
          
         
              <div class="x_content">

                <table class="table">
                 
                  <tbody>
                   
                  </tbody>
                </table>

              </div>
          
          </div></div>
          <div class="tab-pane" id="messages"> <div class="x_content">

              <table class="table">
               
                <tbody>
                  
                </tbody>
              </table>

            </div>
        
        </div></div></div>
          
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>




  @endsection




  
