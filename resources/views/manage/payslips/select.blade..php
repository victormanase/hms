

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Pending Payslips</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('employees.create')}}" type="button" class="btn btn-default">Generatfdsfe Payslips</a>
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
              
              
              <th>Status</th>

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
         
              @foreach ($employees as $employee)
                  
              
              <td>#</td>
              <td>
               {{$employee->first_name}}{{" "}}{{$employee->last_name}}
              
              </td>
              
              
              <td class="project_progress">
             
              <span class="label label-success">{{$employee->status}}</span>
             
             
             
              </td>

              
             
              <td>
                
                <a href="{{route('payslips.edit',$employee->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
               
              
            
          </tbody>
        </table>
        <!-- end project list -->
        {{$employees->links()}}

      </div>
    </div>
  </div>
</div>


  @endsection