

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>P10</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('ptens.create')}}" type="button" class="btn btn-default">Create New P10</a>
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Year</th>
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($years as $year)
                  
              
              <td>#</td>
              <td>
            {{$year}}
              </td>
              
              
            

              
             
              <td>
                <a href="{{route('ptens.show',$year)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <!-- <a href="{{route('ptens.edit',$year)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a> -->
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