{{--  @extends('layouts.main')

@section('titie', '| Create New Role')
@include('partials._messages')
    
@section('content')


<div class="row">
    <div class="col-md-6 col-md-offset-2">

<div class="box {{$errors->all()? "box-danger":"box-success"}}">
            <div class="box-header with-border">
              <h3 class="box-title">Create New Role</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post"  action="{{ route('roles.store') }}">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group {{$errors->has('name')? "has-error": "" }}">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputEmail3" value ="{{ old('name') }}" placeholder="Name">
                     @foreach($errors->get('name') as $message)
                     <span class="help-block">{{ $message }}</span>
                     @endforeach
                  </div>
                </div>
                <div class="form-group {{ $errors->has('display_name') ? "has-error " : ""}}">
                  <label for="display_name" class="col-sm-2 control-label">Display Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="display_name" id="inputEmail3" value ="{{ old('display_name') }}" placeholder="Display Name">
                     @foreach($errors->get('display_name') as $message)
                     <span class="help-block">{{ $message }}</span>
                     @endforeach
                     
                  </div>
                </div>
                <div class="form-group {{$errors->has('description')? "has-error": ""}}">
                  <label for="description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <input type="text"  class="form-control" name="description" id="inputPassword3" placeholder="description">
                   @foreach($errors->get('description') as $message)
                       <span class="help-block">{{$message}}</span>
                        
                    @endforeach
                   
                     
                
               
                  </div>
                </div>
                <hr>
 <h3 class="box-title">Permissions</h3>

 
@foreach($permissions as $permission)
    <div class="checkbox">
  <label><input type="checkbox"  name="permissions[]" value="{{$permission->id}}">  {{$permission->display_name}}</label>
</div>
@endforeach 
                
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{route('roles.index')}}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-info pull-right">Add</button>

              </div>
              <!-- /.box-footer -->
            </form>




      
          </div>



  --}}




          @extends('new.layout')

          @section('titie', '| Create New Role')
          @include('partials._messages')
              
          @section('content')

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Create New Role <small>with permissions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate=""  method="post"  action="{{ route('roles.store') }}" class="form-horizontal form-label-left" novalidate="">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name" placeholder="should have alpha dash" value ="{{ old('name') }}" type="text">
                    </div>
                  </div>

                  

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Display Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="display_name" placeholder="Human friendly name" value ="{{ old('display_name') }}" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="last-name"  required="required" name="description" class="form-control col-md-7 col-xs-12" type="text">
                    </div>
                  </div>
                  
                 
            
                  <span class="section">CRUD Permissions</span>








{{--  
                  @foreach($permissions as $permission)
                      <div class="checkbox">
                        <label class="">
                          <div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value="{{$permission->id}}" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> {{$permission->display_name}}
                        </label>
                      </div>
                  @endforeach
                     <span class="section">ACL</span>  --}}


                    <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>Module</th>
                            <th>CREATE</th>
                            <th>READ</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Overview</td>
                           
                           @foreach ($overviews as $overview)
                           <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$overview->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$overview->name}}</label></div></td>
                           @endforeach
                          </tr>


                          <tr>
                       
                            <td>Departments</td>
                            @foreach ($departments as $department)
                            <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$department->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$department->name}}</label></div></td>
                            @endforeach
                          </tr>
                          <tr>
                    
                            <td>Designation</td>
                            @foreach ($designations as $designation)
                            <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$designation->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$designation->name}}</label></div></td>
                            @endforeach
                          </tr>
  
                          <tr>
                              <td>Salary Scales</td>
                              @foreach ($salaryscales as $salaryscale)
                              <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$salaryscale->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$salaryscale->name}}</label></div></td>
                              @endforeach
                            </tr>
                            <tr>
                              <td>Banks</td>
                              @foreach ($banks as $bank)
                              <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$bank->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$bank->name}}</label></div></td>
                              @endforeach
                            </tr>   
                            <tr>
                                <td>Nationalities</td>
                                @foreach ($nationalities as $nationality)
                                <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]"  value={{$nationality->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$nationality->name}}</label></div></td>
                                @endforeach
                              </tr>   
                              <tr>
                                  <td>Leave Types</td>
                                  @foreach ($leavetypes as $leavetype)
                                  <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$leavetype->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$leavetype->name}}</label></div></td>
                                  @endforeach
                                </tr>    
                                
                                <tr>
                                    <td>Qualifications</td>
                                    @foreach ($qualifications as $qualification)
                                <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$qualification->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$qualification->name}}</label></div></td>
                                @endforeach
                                  </tr>
                                  <tr>
                                      <td>Work Stations</td>
                                      @foreach ($workstations as $workstation)
                                      <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$workstation->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$workstation->name}}</label></div></td>
                                      @endforeach
                                    </tr>
                                    <tr>
                                        <td>Employees</td>
                                        @foreach ($employees as $employee)
                                        <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$employee->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$employee->name}}</label></div></td>
                                        @endforeach
                                      </tr>   

                                      <tr>
                                        <td>Leaves</td>
                                        @foreach ($leaves as $leave)
                                        <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$leave->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$leave->name}}</label></div></td>
                                        @endforeach
                                      </tr>  
                                      
                                      <tr>
                                          <td>Vacancies</td>
                                          @foreach ($vacancies as $vacancy)
                                <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$vacancy->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$vacancy->name}}</label></div></td>
                                @endforeach
                                        </tr>
  
                                        <tr>
                                            <td>Applications</td>
                                            @foreach ($applications as $application)
                                            <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$application->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$application->name}}</label></div></td>
                                            @endforeach
                                          </tr>

                                          <tr>
                                              <td>Field Students</td>
                                              @foreach ($fieldstudents as $fieldstudent)
                                              <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$fieldstudent->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$fieldstudent->name}}</label></div></td>
                                              @endforeach
                                            </tr>

                                            <tr>
                                                <td>Internships</td>
                                                @foreach ($internships as $intern)
                                                <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$intern->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$intern->name}}</label></div></td>
                                                @endforeach
                                              </tr>


                                              <tr>
                                                  <td>Volunteer</td>
                                                  @foreach ($volunteers as $volunteer)
                                                  <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$volunteer->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$volunteer->name}}</label></div></td>
                                                  @endforeach
                                                </tr>

                                                <tr>
                                                    <td>Scholarship</td>
                                                    @foreach ($scholarships as $scholarship)
                                                    <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$scholarship->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$scholarship->name}}</label></div></td>
                                                    @endforeach
                                                  </tr>
                                          
                                          <tr>
                                              <td>Roles</td>
                                              @foreach ($roles as $role)
                                              <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$role->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$role->name}}</label></div></td>
                                              @endforeach
                                            </tr> 
                                            
                                            <tr>
                                                <td>Users</td>
                                                @foreach ($users as $user)
                                                <td> <div class="checkbox"><label class=""><div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="permissions[]" value={{$user->id}} style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>{{$user->name}}</label></div></td>
                                                @endforeach
                                              </tr> 
                        </tbody>
                      </table>

                      <span class="section"> Basic Permissions</span>

                      <table class="table table-striped">
                        <thead>
                          <tr>
                           
                            <th>Name</th>
                            <th>Allow/Deny</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                           
                            <td>Mark</td>
                            <td>Otto</td>
                          
                          </tr>
                          <tr>
                           
                            <td>Jacob</td>
                            <td>Thornton</td>
                           
                          </tr>
                          <tr>
                          
                            <td>Larry</td>
                            <td>the Bird</td>
                           
                          </tr>
                        </tbody>
                      </table>

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