{{--  @extends('layouts.main')

@section('title','| All roles')
@section('page_header',"All Roles")



@section('discription', " ")

@section('content')

@include('partials._messages')
     <div class="box">
     
            <div class="box-header col-md-8 ">
              <h3 class="box-title">Manage Roles</h3>
            </div>
            <div class="box-header col-md-2 col-md-offset-2">
              <a href="{{route('roles.create')}}" class="btn btn-success btn-block"><i class="fa fa-role-plus"></i>  <span>Create New Role</span></a>
            </div>

 
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
  
                 <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->name}}</td>
                  <td>{{$role->created_at->toFormattedDateString()}}</td>
                  
                  <td> 
                  <a href="{{route('roles.show',$role->id)}}" class="btn btn-default btn-xs">Details</a> 
                  <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary btn-xs">Edit   </a>
                 
                  </td>

                </tr>   
                    
                @endforeach
                   
                <tfoot>             
                  <th>#</th>
                  <th>Name</th>

                  <th>Date Created</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->


  --}}


            @extends('new.layout')

@section('title','| All Roles')
@section('page_header',"All Roles")



@section('discription', " ")

@section('content')

@include('partials._messages')
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Roles <small>Beloning to {{session('CompanyName')}}</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="{{route('roles.create')}}" type="button" class="btn btn-default">Add New Role</a>
                
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table">
                <thead>
                  <tr>
              
                    <th>#</th>
                    <th>Name</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($roles as $role)
  
                 <tr>
                  <td>{{$role->id}}</td>
                  <td>{{$role->display_name}}</td>
                  <td>{{$role->created_at->toFormattedDateString()}}</td>
              
                 
                  
                  <td>
                    <a href="{{route('roles.show',$role->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                    <a href="{{route('roles.edit',$role->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
                  </td>

                </tr>   
                    
                @endforeach
                </tbody>
              </table>

            </div>
          </div>
        </div>



    
@endsection