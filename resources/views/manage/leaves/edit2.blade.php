
@extends('new.layout')
@section('content')

@include('partials._messages')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Leave</small></h2>
          <ul class="nav navbar-right panel_toolbox">
           
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          <form class="form-horizontal" method="post" action="{{route('update.leave.request',$leave->id)}}">
           
               <input type="hidden" name="_method" value="PUT">
                  {{csrf_field() }}
                
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Leave Type</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="leaveType_id">
                            <option value="">**Please select Leave Type</option>
                            @foreach ($leaveTypes as $leaveType)
                              <option value="{{$leaveType->id}}" selected="{{$leave->leaveType->id==$leaveType->id}}">{{$leaveType->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
        
                   
                    <!--date-->
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Start date</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name='start_date' value="{{$leave->start_date}}" class="form-control pull-right" id="datepicker" placeholder="Date">
                      
                      </div>
                      </div>
               
                    <!-- /.input group -->
                    
        
                     <!--end date-->
                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
          
                        <input type="date" name="end_date" value="{{$leave->end_date}}"  class="form-control pull-right" id="datepicker" placeholder="Date">
                        
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
                
                  <!-- /.box-body -->
                 
               
                  <div class="ln_solid"></div>
              
                  <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
            <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
            </form>
  
        </div>
      </div>
    </div>
  </div>
    
@endsection