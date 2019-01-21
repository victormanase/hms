

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Companies</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('companies.create')}}" type="button" class="btn btn-default">Register New Company</a>
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Company Name</th>
              <th>Location</th>
              <th>Total Employees</th>
              <th>Founder</th>
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($companies as $company)
                  
              
              <td>#</td>
              <td>
               {{$company->name}}
                <br>
                <small>Registered {{$company->created_at}}</small>
              </td>
              <td>
                {{$company->hq}}
              </td>
              <td class="project_progress">
                {{$company->employees->count()}}
              </td>
              <td>
                {{$company->founder}}
              </td>
              <td>
                <a href="{{route('companies.show',$company->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('companies.edit',$company->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
                @endforeach
              
            
          </tbody>
        </table>
        {{ $companies->links() }}

      </div>
    </div>
  </div>
</div>


  @endsection