
@extends('new.layout')
@section('content')

@include('partials._messages')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       VACANCY
          <!-- <small>Edit</small> -->
        </h1>
        
      </section>
  
   <section class="content">
        
          <div class="col-md-12">
            <!-- Horizontal Form -->
           
              
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{route('vacancies.update',$vacancy->id)}}" enctype="multipart/form-data">
            
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="PATCH">
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
                <!-- /.box-body -->
                <div class="box-footer">
                  
                  <button type="submit" class="btn btn-block btn-primary btn-lg  fa fa-save"> Save</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
        </div>
        </section>
  </div>
  <!-- /.content-wrapper -->

	 
	@endsection