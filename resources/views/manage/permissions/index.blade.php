


            @extends('new.layout')

@section('title','| All Permissions')
@section('page_header',"All Permissions")



@section('discription', " ")

@section('content')

@include('partials._messages')
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Permissions <small>Beloning to {{session('CompanyName')}}</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <a href="{{route('permissions.create')}}" type="button" class="btn btn-default">Add New Permission</a>
                
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
                  @foreach($permissions as $permission)
  
                 <tr>
                  <td>{{$permission->id}}</td>
                  <td>{{$permission->display_name}}</td>
                  <td>{{$permission->created_at->toFormattedDateString()}}</td>
              
                 
                  
                  <td>
                    {{--  <a href="{{route('permissions.show',$permission->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>  --}}
                    <a href="{{route('permissions.edit',$permission->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
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