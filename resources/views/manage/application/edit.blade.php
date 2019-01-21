
@extends('new.layout')
@section('content')

@include('partials._messages')
{{--  <div class="col-md-5 col-md-offset-3">



    <div class="box box-info">
        <form class="form-horizontal" method="post" action="{{route('applications.update',$application->id)}}">
            {{csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Applicant Name</label>
  
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail3" name="applicant_name" value="{{$application->applicant_name}}" placeholder="name">
                </div>
              </div>
  
              <div class="form-group">
                <label for="Position" class="col-sm-3 control-label">Position</label>
  
                <div class="col-sm-9">
                  
                
                <select class="form-control" name="vacancy_id">
                @foreach ($vacancies as $vacancy)
                <option value="{{$vacancy->id}}">{{$vacancy->position_name}}</option>
                @endforeach
                  
                </select>
            
                </div>
              </div>
              <!--date-->
               <div class="form-group">
              <label for="date" class="col-sm-3 control-label">Application Date:</label>
  
                <div class=" col-sm-9  ">
               
  
                <input type="date"  class=" form-control pull-right" value="{{$application->created_at}}" id="datepicker" placeholder="Date">
                
                </div>
                </div>
         
              <!-- /.input group -->
              
  
               <!--end date-->
              <div class="form-group">
                <label for="inputPassword3" name="status" class="col-sm-3 control-label">Status</label>
  
                <div class="col-sm-9">
                  
                
                <select class="form-control" name="status">
                  <option value="1">Applied</option>
                  <option value="2">On Review</option>
                  <option value="3">Interview</option>
                  <option value="4">Hired</option>
                  <option value="5">Rejected</option>
                </select>
            
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
            <div class="box-footer">
              <button type="submit" class="btn btn-block btn-lg btn-primary fa fa-save"> Save</button>
              <!-- <button type="submit" class="btn btn-info btn-lg pull-right fa fa-save"> Save</button> -->
            </div>
            <!-- /.box-footer -->
          </form>
      </div>
</div>  --}}


<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Edit Application</h2>
      <ul class="nav navbar-right panel_toolbox">
        
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <br>
      <form id="demo-form2" data-parsley-validate="" method="post" action="{{route('applications.update',$application->id)}}" class="form-horizontal form-label-left" novalidate="">
       
          {{method_field('PUT')}}
          
        {{csrf_field() }}

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Applicant Name <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="first-name" required="required" name="applicant_name" value="{{$application->applicant_name}}" class="form-control col-md-7 col-xs-12" type="text">
          </div>
        </div>


        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Position <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="vacancy_id">
                    @foreach ($vacancies as $vacancy)
                    <option value="{{$vacancy->id}}">{{$vacancy->position_name}}</option>
                    @endforeach
                      
                    </select>
            </div>
          </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="status">
                    <option value="1">Applied</option>
                    <option value="2">On Review</option>
                    <option value="3">Interview</option>
                    <option value="4">Hired</option>
                    <option value="5">Rejected</option>
                  </select>
            </div>
        </div>
      
       
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Application <span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{$application->created_at}}" required="required" type="date">
          </div>
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button class="btn btn-primary" type="button">Cancel</button>
        
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>

  
    
@endsection