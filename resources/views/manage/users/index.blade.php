@extends('new.layout')

@section('title','| All Users')
@section('page_header',"All Users")



@section('discription', " ")

@section('content')

@include('partials._messages')
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>System Users <small>Beloning to {{session('CompanyName')}}</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="{{route('users.create')}}" type="button" class="btn btn-default">Register New User</a>
                
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">

              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date Created</th>
                  <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
  
                 <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at->toFormattedDateString()}}</td>
                  
                  <td>
                    <a href="{{route('users.show',$user->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
                  </td>

                </tr>   
                    
                @endforeach
                </tbody>
              </table>
              {{$users->links()}}

            </div>
          </div>
        </div>



    
@endsection