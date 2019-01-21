

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Left Employees</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('employees.create')}}" type="button" class="btn btn-default">Register New Employee</a>
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Employee Name</th>
              {{--  <th>Designation</th>  --}}
              <th>Nationality</th>
              <th>Status</th>

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($employees as $employee)
                  
              
              <td>#</td>
              <td>
               {{$employee->first_name}}
                <br>
                <small>Born {{$employee->DOB}}</small>
              </td>
              {{--  <td>
                  {{$employee->designation->designation_name}}
                </td>  --}}
              <td>
                {{$employee->nationality->nationality_name}}
              </td>
              <td class="project_progress">
                {{$employee->status}}
              </td>
             
              <td>
                <a href="{{route('employees.show',$employee->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('employees.edit',$employee->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
              
            
          </tbody>
        </table>
        <!-- end project list -->

      </div>
    </div>
  </div>
</div>


  @endsection