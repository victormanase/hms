

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Field Students</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('field-students.create')}}" type="button" class="btn btn-default">Register New Field Student</a>
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Student Name</th>
              {{--  <th>Designation</th>  --}}
              <th>From</th>
              <th>Department</th>

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($fieldStudents as $fieldStudent)
                  
              
              <td>#</td>
              <td>
               {{$fieldStudent->first_name}}
                <br>
                <small>Started  {{$fieldStudent->start_date}}</small>
              </td>
              {{--  <td>
                  {{$fieldStudent->designation->designation_name}}
                </td>  --}}
              <td>
                {{$fieldStudent->from}}
              </td>
              <td >
                {{$fieldStudent->department->department_name}}
              </td>
             
              <td>
                <a href="{{route('field-students.show',$fieldStudent->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('field-students.edit',$fieldStudent->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
              
            
          </tbody>
        </table>
        <!-- end project list -->
        {{$fieldStudents->links()}}
      </div>
    </div>
  </div>
</div>


  @endsection