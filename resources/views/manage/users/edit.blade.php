{{--  @extends('layouts.main')

@section('titie', '| Edit User')
@include('partials._messages')
    
@section('content')


<div class="row">
    <div class="col-md-6 col-md-offset-2">

<div class="box {{$errors->all()? "box-danger":"box-success"}}">
            <div class="box-header with-border">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal"  method="post" action="{{ route('users.update',$user->id) }}">
                 {{method_field('PUT')}}
                {{ csrf_field() }}
              
              <div class="box-body" id="app">
                <div class="form-group {{$errors->has('name')? "has-error": "" }}">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                  
                    <input type="text" class="form-control" name="name" id="inputEmail3" value ="{{$user->name}}" placeholder="Name">
                     @foreach($errors->get('name') as $message)
                     <span class="help-block">{{ $message }}</span>
                     @endforeach
                  </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? "has-error " : ""}}">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" id="inputEmail3" value ="{{ $user->email or old('email') }}" placeholder="Email">
                     @foreach($errors->get('email') as $message)
                     <span class="help-block">{{ $message }}</span>
                     @endforeach
                     
                  </div>
                </div>
            
                  <div class="form-group">
                  <div class="radio">
                    <label>
                      <input v-model="picked" name="keep" type="radio" value="dontShowPasswordBox">
                      Keep this Users Password
                    </label>
                  </div>

                  <div class="radio" >
                    <label>
                      <input v-model="picked" name="keep" type="radio" value="showPasswordBox">
                      Change this Users Password
                     
                    </label>
                  </div>
            <template v-if="picked==='showPasswordBox'">
                  <div class="form-group {{$errors->has('password')? "has-error": ""}}">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password"  class="form-control" name="password" id="inputPassword3" placeholder="Password">
                   @foreach($errors->get('password') as $message)
                       <span class="help-block">{{$message}}</span>
                        
                    @endforeach
                   
                  
                
               
                  </div>
                </div>
                </template>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="{{route('users.index')}}" class="btn btn-default">Back</a>
                <button type="submit" class="btn btn-info pull-right">Save Changes</button>

              </div>
              <!-- /.box-footer -->
              
           
            </form>







      
          </div>

         


        

  
    
@endsection  --}}





@extends('new.layout')

@section('titie', '| Edit User')
@include('partials._messages')
    
@section('content')





          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Edit User</h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" action="{{ route('users.update',$user->id) }}" data-parsley-validate="" method="post" enctype="multipart/form-data"  class="form-horizontal form-label-left" novalidate="">
                    {{method_field('PUT')}}
                  {{ csrf_field() }}




              @if (!(Auth::user()->hasRole('superadministrator')))
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
              @endif

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" value ="{{ $user->name or old('name') }}" name="name" type="text">
                    </div>
                                </div>



              @if (Auth::user()->hasRole('superadministrator'))
              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Profile Picture
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="first-name"  class="form-control col-md-7 col-xs-12" type="file" name="image">
                  </div>
                </div>
              @endif
                              

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="last-name" name="email" required="required" value ="{{ $user->email or old('email') }}"  class="form-control col-md-7 col-xs-12" type="email">
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
                          <div class="icheckbox_flat-green" style="position: relative;"><input class="flat"  {{(in_array($role->id,$checked)||in_array(old('id'),$checked)) ? "checked":""}} name="roles[]" value="{{$role->id}}" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> {{$role->display_name}}
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