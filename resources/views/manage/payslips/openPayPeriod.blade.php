

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Select Pay Period</h2>
        <ul class="nav navbar-right panel_toolbox">
         
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <form id="demo-form2" data-parsley-validate="" method="post" action="{{route('openPayPeriod.store')}}" class="form-horizontal form-label-left" novalidate="">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required"  name="date" class="form-control col-md-7 col-xs-12" type="date">
                      </div>
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>

      </div>
    </div>
  </div>
</div>


  @endsection