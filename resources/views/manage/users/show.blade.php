{{--  @extends('layouts.main')

@section('titie', '| User Details')
@include('partials._messages')
    
@section('content')


<div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">{{ $user->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <p>Email: {{$user->email}}</p>
        <p>Email: {{$user->created_at}}</p>
        <div><a href="{{route('users.index')}}" class="btn btn-default ">Back</a> 
                  <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary ">Edit   </a></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>



        

  
    
@endsection  --}}





@extends('new.layout')
@section('titie', '| User Details')
@include('partials._messages')
    
@section('content')


<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $user->name }}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-info">Edit Role</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <h4>Name</h4>
          <p>{{$user->name}}</p>
          <h4>Name</h4>
          <p>{{$user->email}}</p>
         
        <span class="section">Roles</span>
       
          @foreach($roles as $role)
        <p>
          <span class="icon"><i class="fa fa-check-circle green"></i></span> <span class="name">{{$role->display_name}}</span>
        </p>
        @endforeach
      </div>
    </div>
  </div>
</div>
  
    
@endsection