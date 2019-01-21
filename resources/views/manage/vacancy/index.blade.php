
@extends('new.layout')
@section('content')

@include('partials._messages')
{{--  <!-- Content Wrapper. Contains page content -->
<div class="row">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      VACANCIES
        
      </h1>
      <ol class="breadcrumb">
       
        
      </ol>


      <div class="modal fade" id="modal-default">
					<div class="modal-dialog">
						
					  <div class="modal-content">
                <form class="form-horizontal" method="post" action="{{route('vacancies.store')}}">
            
                    {{csrf_field()}}
                    
                  <div class="box-body">
                   
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-3 control-label">Position name</label>
        
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" name="position_name" placeholder="Mechanical Engineer">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Number of Vacancies</label>
          
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="number_of_positions" id="inputEmail3" placeholder="6">
                            </div>
                          </div>
                    <!--date-->
                     <div class="form-group">
                    <label for="date" class="col-sm-3 control-label">Deadline</label>
    
                      <div class=" col-sm-9  ">
                     
    
                      <input type="date" class=" form-control pull-right"  name="last_application_date" id="datepicker" placeholder="Date">
                      
                      </div>
                      </div>
										
									
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						  <button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
					  </div>
					  <!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				  </div>
				  <!-- /.modal -->
    </section>

    <!-- Main content -->

    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Position Name</th>
                  <th>Vacancy </th>
                  <th>Last Update</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                        @foreach ($vacancies as $vacancy)
                <tr>
             
                     <td>{{$vacancy->id}}</td>
                     <td>{{$vacancy->position_name}}</td>
                     <td>{{$vacancy->number_of_positions}}</td>
                     <td>{{$vacancy->last_application_date}}</td>
                     <td><div class="list-inline">
                            <li><a href="{{route('vacancies.edit',$vacancy->id)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
                            <li><a href="#" id="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-ban" aria-hidden="true"></i> </a></li>
                </div></td>
                </tr>
                 @endforeach
                
        
               
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Position Name</th>
                    <th>Vacancy </th>
                    <th>Last Update</th>
                    <th>Action</th>
                    
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
     <!--    </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
   


  --}}






<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Vacancies</h2>
      <ul class="nav navbar-right panel_toolbox">
        <button type="button" class="btn  btn-default  fa fa-plus" data-toggle="modal" data-target="#modal-default">  Add New Vacancy</button>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Position Name</th>
          <th>Vacancy </th>
          <th>Deadline</th>
          <th>Action</th>
          
        </tr>
        </thead>
        <tbody>
                @foreach ($vacancies as $vacancy)
        <tr>
     
             <td>{{$vacancy->id}}</td>
             <td>{{$vacancy->position_name}}</td>
             <td>{{$vacancy->number_of_positions}}</td>
             <td>{{$vacancy->last_application_date}}</td>
             <td><div class="list-inline">
                    <li><a href="{{route('vacancies.edit',$vacancy->id)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
                    <li><a href="#" id="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-ban" aria-hidden="true"></i> </a></li>
        </div></td>
        </tr>
         @endforeach
        

       
        </tbody>
        <tfoot>
        <tr>
            <th>ID</th>
            <th>Position Name</th>
            <th>Vacancy </th>
            <th>Deadline</th>
            <th>Action</th>
            
        </tr>
        </tfoot>
      </table>
      {{$vacancies->links()}}
    </div>
  </div>


  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      
      <div class="modal-content">
          <form class="form-horizontal" method="post" action="{{route('vacancies.store')}}">
      
              {{csrf_field()}}
              
            <div class="box-body">
             
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Position name</label>
  
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" name="position_name" placeholder="Mechanical Engineer">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Number of Vacancies</label>
    
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="number_of_positions" id="inputEmail3" placeholder="6">
                      </div>
                    </div>
              <!--date-->
               <div class="form-group">
              <label for="date" class="col-sm-3 control-label">Deadline</label>

                <div class=" col-sm-9  ">
               

                <input type="date" class=" form-control pull-right"  name="last_application_date" id="datepicker" placeholder="Date">
                
                </div>
                </div>
              
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>



</div>




















	@endsection