{{--  @extends('layouts.main')

@section('titie', '| Role Details')
@include('partials._messages')
    
@section('content')


<div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">{{ $role->display_name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <p>Name: {{$role->display_name}}</p>
        <p>Description: {{$role->description}}</p>
        <hr>
        


        <ul>
        @foreach($permissions as $permission)
            <li>{{$permission->display_name}}</li>
        @endforeach
        </ul>
        <div><a href="{{route('roles.index')}}" class="btn btn-default ">Back</a> 
                  <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary ">Edit   </a></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

</div>
  --}}



@extends('new.layout')
@section('titie', '| Role Details')
@include('partials._messages')
    
@section('content')


<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>{{ $role->display_name }}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <a href="{{route('roles.edit',$role->id)}}" type="button" class="btn btn-info">Edit Role</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <h4>Display Name</h4>
          <p>{{$role->display_name}}</p>
          <h4>Name</h4>
          <p>{{$role->name}}</p>
          <h4>Description</h4>
          <p>{{$role->description}}</p>

        <span class="section">Permissions</span>
       
          @foreach($permissions as $permission)
        <p>
          <span class="icon"><i class="fa fa-check-circle green"></i></span> <span class="name">{{$permission->name}}</span>
        </p>
        @endforeach
      </div>
    </div>
  </div>
</div>
  
    
@endsection