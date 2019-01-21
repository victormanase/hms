

@extends('new.layout')
@section('content')

    <div class="row">
        @include('partials._messages')  
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Intern Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" method="post" data-parsley-validate="" class="form-horizontal form-label-left" action='{{route('interns.update',$intern->id)}}' enctype="multipart/form-data" novalidate="">
                      <input type="hidden" name="_method" value="PUT">
                        {{csrf_field()}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="first-name" required="required" name="first_name" value="{{$intern->first_name or old('first_name')}}" class="form-control col-md-7 col-xs-12" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Middle Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last-name"  required="required" value="{{$intern->middle_name or old('last_name')}}" class="form-control col-md-7 col-xs-12" name="middle_name" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last-name"  required="required" value="{{$intern->last_name or old('last_name')}}" class="form-control col-md-7 col-xs-12" name="last_name" type="text">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">From <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="last-name"  required="required" value="{{$intern->from or old('from')}}" class="form-control col-md-7 col-xs-12" name="from" type="text">
                        </div>
                      </div>



                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone Number <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="last-name"  required="required" value="{{$intern->phone_number or old('phone_number')}}" class="form-control col-md-7 col-xs-12" name="phone_number" type="text">
                          </div>
                        </div>
                
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input name="gender" value="1" data-parsley-multiple="gender" type="radio"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input name="gender" value="0" data-parsley-multiple="gender" type="radio"> Female
                            </label>
                          </div>
                        </div>
                      </div>
           

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Picture 
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="first-name"  class="form-control col-md-7 col-xs-12" type="file" name="image">
                                    </div>
                                  </div>
                                 

                                  <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control " name="department_id">
                                            <option value="">**Please select department </option>
                                            @foreach ($departments as $department) { 
                                               <option value="{{$department->id}}" selected="{{$intern->department_id===$department->id?"selected":""}}">{{$department->department_name}}</option>
                                           @endforeach
                                        </select>
                                      </div>
                                    </div>



                                          <div class="form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Begin Date 
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{$intern->start_date or old('start_date')}}" name="start_date" type="date">
                                              </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date 
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{$intern->end_date or old('end_date')}}" name="end_date" type="date">
                                                </div>
                                               </div>

                                               <div class="form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Comments 
                                                </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <textarea class="form-control" rows="3" name="comments" placeholder="Comment on Intern"> {{$intern->comments or old('comments')}}</textarea>
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














    


