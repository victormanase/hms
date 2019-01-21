
@extends('new.layout')
@section('content')

@include('partials._messages')

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Leaves</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Request Leave</button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">

            <div class="col-md-2 nav nav-pills" style="padding-left: 2em">
                <a href="{{route('manage.employee.leave','0')}}"  class="btn btn-primary btn-block margin-bottom ">All</a>
                <a href="{{route('manage.employee.leave','1')}}"  class="btn btn-primary btn-block margin-bottom ">Pending</a>
                 <a href="{{route('manage.employee.leave','2')}}"  class="btn btn-primary btn-block margin-bottom">Accepted</a>
        
                 <a href="{{route('manage.employee.leave','3')}}"   class="btn btn-danger btn-block margin-bottom">Rejected</a>
                
                <!-- /. box -->
                
                <!-- /.box -->
              </div>
        
              <div class="col-xs-10" id="Interview">
            
                  <div class="box-header">
                    <h3 class="box-title">@if (Request::is('manage/employee-leaves/1'))
                        {{"Pending"}}
                    @elseif(Request::is('manage/employee-leaves/2'))
                    {{"Accepted"}}
                    @elseif(Request::is('manage/employee-leaves/0'))
                    {{"All"}}
                    @else(Request::is('manage/lemployee-eaves/3'))
                    {{"Rejected"}}   
                   
                    @endif </h3>
                  </div>

                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Employee Name</th>
                          <th>Leave Type</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th >Status</th>
                          <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($leaves as $leave)
                        <tr>
                            <th scope="row">{{$leave->id}}</th>
                            <td>{{$leave->employee->first_name}}{{" "}}{{$leave->employee->last_name}}</td>
                            <td>{{$leave->leaveType->name}}</td>
                            <td>{{$leave->start_date}}</td>
                            <td>{{$leave->end_date}}</td>
                            <td>@if ($leave->status=='1')
                              <span class="label label-primary">Pending</span>
                            @elseif($leave->status=='2')
                            <span class="label label-success">Accepted</span>
                            @else
                            <span class="label label-danger">Rejected</span>
                            @endif</td>
                            <td>
                                <a href="{{route('manage.editLeave',$leave->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
                            </td>
                          </tr>
                            
                        @endforeach
                       
                       
                      </tbody>
                    </table>
                  <!-- /.box-body -->
              
        
              
            
             
                  </div>
                  <!-- /.box-body -->
                </div>
        </div>
      </div>




    
     













         <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Request Leave</h4>
              </div>
              <form class="form-horizontal" method="post" action="{{route('manage.leave.request')}}">
              <div class="modal-body">
               
                  {{csrf_field() }}
                  <div class="box-body">
                   
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Leave Type</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="leaveType_id">
                            <option value="">**Please select Leave Type</option>
                            @foreach ($leaveTypes as $leaveType)
                              <option value="{{$leaveType->id}} ">{{$leaveType->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
        
                   
                    <!--date-->
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">start_date</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                     
        
                      <input type="date" name='start_date' class=" form-control pull-right" id="datepicker" placeholder="Date">
                      
                      </div>
                      </div>
               
                    <!-- /.input group -->
                    
        
                     <!--end date-->
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">End date</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
          
                        <input type="date" name="end_date"  class=" form-control pull-right" id="datepicker" placeholder="Date">
                        
                        </div>
                        </div>
                    <!-- <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Remember me
                          </label>
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <!-- /.box-body -->
                 
               
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

            </div>
          </div>
        </div>








    </div>




@endsection