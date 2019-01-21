

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Banks</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('banks.create')}}" class="btn btn-default">Add New Bank</a>



            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

       

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Bank Name</th>
            
              <th>Total Employees</th>
             
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($banks as $bank)
                
           
            <tr>
              <td>#</td>
              <td>
                <a>{{$bank->bank_name}}</a>
                <br>
                <small>Registered {{$bank->created_at}}</small>
              </td>
             
              <td>
            9
              </td>
             
              <td>
              <a href="{{route('banks.show',$bank->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('banks.edit',$bank->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
        <!-- end project list -->
    {{$banks->links()}}

      </div>
    </div>
  </div>
</div>


  @endsection