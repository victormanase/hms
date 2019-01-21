

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>scholarships</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('scholarships.create')}}" type="button" class="btn btn-default">Register New Scholarship</a>
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
              <th>University</th>
              {{--  <th>Country</th>  --}}

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($scholarships as $scholarship)
                  
              
              <td>#</td>
              <td>
               {{$scholarship->employee->first_name}} {{" "}} {{$scholarship->employee->last_name}}
                <br>
              
              </td>
              {{--  <td>
                  {{$intern->designation->designation_name}}
                </td>  --}}
              <td>
                  {{$scholarship->university}}
              </td>
              {{--  <td >
                  {{$scholarship->country->country_name}}
              </td>
               --}}
              <td>
                <a href="{{route('scholarships.show',$scholarship->employee->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('scholarships.edit',$scholarship->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
              
            
          </tbody>
        </table>
        <!-- end project list -->

        {{$scholarships->links()}}

      </div>
    </div>
  </div>
</div>


  @endsection