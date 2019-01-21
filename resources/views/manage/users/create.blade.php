@extends('new.layout')

@section('titie', '| Create New User')
@include('partials._messages')
    
@section('content')





          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Create New User</h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate="" method="post"  action="{{ route('users.store') }}" class="form-horizontal form-label-left" novalidate="">
                  {{ csrf_field() }}
                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control " name="department_id2">
                            <option value="">**Please select department </option>
                            @foreach ($departments as $department) { 
                               <option value="{{$department->id}}">{{$department->department_name}}</option>
                           @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control " name="employee_id">
                              <option value="">**Please select Employee </option>
                             
                          </select>
                        </div><div class="col-md-2"><span id="loader1"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>
                      </div>

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="last-name" name="name" required="required" value ="{{ $user->name or old('name') }}"  class="form-control col-md-7 col-xs-12" type="text">
                          </div>
                        </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="last-name" name="email" required="required" value ="{{ $email or old('email') }}"  class="form-control col-md-7 col-xs-12" type="email">
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="birthday"  class="form-control col-md-7 col-xs-12" name="password" required="required" type="password">
                    </div>
                  </div>

                  <span class="section">Roles</span>

                  @foreach($roles as $role)
                      <div class="checkbox">
                        <label class="">
                          <div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="roles[]" value="{{$role->id}}" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> {{$role->display_name}}
                        </label>
                      </div>
                  @endforeach
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