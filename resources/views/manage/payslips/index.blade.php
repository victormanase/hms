

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Employees</h2>
        <ul class="nav navbar-right panel_toolbox">
          <!-- <a href="{{route('employee.select')}}" type="button" class="btn btn-default">Create New Payslip</a> -->
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
             
              <th>Payslip Month</th>
              <th>Status</th>

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($payslips as $payslip)
                  
              
              <td>#</td>
              <td>
               {{$payslip->employee->first_name}}{{" "}}{{$payslip->employee->last_name}}
                
              </td>
              
              <td>
                {{$payslip->date->format('F Y')}}
              </td>
              <td class="project_progress">
                PAID
              </td>
             
              <td>
                <a href="{{route('payslips.show',$payslip->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <!-- <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a> -->
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
              
            
          </tbody>
        </table>
        <!-- end project list -->

        {{$payslips->links()}}

      </div>
    </div>
  </div>
</div>


  @endsection