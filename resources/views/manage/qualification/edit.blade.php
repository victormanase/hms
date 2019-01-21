
@extends('new.layout')
@section('content')
<div class="col-md-6 col-sm-6 col-xs-6">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Qualification</h2>
        <ul class="nav navbar-right panel_toolbox">
         
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('qualifications.update',$qualification->id)}}" method="post" novalidate="">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" required="required" name="qualification_name" value="{{$qualification->qualification_name or old('qualification_name')}}"   class="form-control col-md-7 col-xs-12" type="text">
            </div>
          </div>
         
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
  
    
@endsection