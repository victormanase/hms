

@extends('new.layout')
@section('content')

    <div class="row">
        @include('partials._messages')  
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>scholarship Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" data-parsley-validate="" class="form-horizontal form-label-left" action='{{route('scholarships.store')}}' enctype="multipart/form-data" novalidate="">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control " name="employee_id">
                                  <option value="">**Please select Employee </option>
                                  @foreach ($employees as $employee) { 
                                    <option value="{{$employee->id}}">{{$employee->first_name}} {{" " }}  {{$employee->last_name}}</option>
                                 @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">University <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last-name"  required="required" value="{{old('from')}}" class="form-control col-md-7 col-xs-12" name="university" type="text">
                              </div>
                            </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Course <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last-name"  required="required" value="{{old('last_name')}}" class="form-control col-md-7 col-xs-12" name="course" type="text">
                        </div>
                      </div>
             
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Begin Date 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{old('start_date')}}" name="start_date" type="date">
                          </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{old('end_date')}}" name="end_date" type="date">
                            </div>
                           </div>

           

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agreement Later 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="first-name"  class="form-control col-md-7 col-xs-12" type="file" name="agreement_letter">
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














    


