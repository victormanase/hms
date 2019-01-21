 @extends('new.layout') @section('content')
 <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Select Month</h2>
              <ul class="nav navbar-right panel_toolbox">
               
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              <form id="demo-form2" method="post" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('bankLetter.store')}}" novalidate="">
              {{csrf_field()}}
                <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="" name="date" required="required" type="date">
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
      </div>



@endsection