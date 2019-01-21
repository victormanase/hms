
@extends('new.layout')
@section('content')

@include('partials._messages')






    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Applications</h2>
          <ul class="nav navbar-right panel_toolbox">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Add Application</button>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">

            <div class="col-md-2 nav nav-pills" style="padding-left: 2em">
                <a href="{{route('applications.show','1')}}"  class="btn btn-primary btn-block margin-bottom ">Applied</a>
                 <a href="{{route('applications.show','2')}}"  class="btn btn-primary btn-block margin-bottom">On Review</a>
        
                 <a href="{{route('applications.show','3')}}"   class="btn btn-primary btn-block margin-bottom">Interview</a>
                  <a href="{{route('applications.show','4')}}"   class="btn btn-primary btn-block margin-bottom">Hired</a>
                   <a href="{{route('applications.show','5')}}" class="btn btn-danger btn-block margin-bottom">Declined</a>
                <!-- /. box -->
                
                <!-- /.box -->
              </div>
        
              <div class="col-xs-10" id="Interview">
            
                  <div class="box-header">
                    <h3 class="box-title">@if (Request::is('manage/applications/1'))
                        {{"Applied"}}
                    @elseif(Request::is('manage/applications/2'))
                    {{"On Review"}}
                    @elseif(Request::is('manage/applications/3'))
                    {{"Interview"}}   
                    @elseif(Request::is('manage/applications/4'))
                    {{"Hired"}}   
                    @else
                    {{"Rejected"}}  
                    @endif </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example5" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Applicant Name</th>
                        <th>Position</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                        <th >Action</th>
                        
                      </tr>
                      </thead>
                      <tbody>
                     
        
                        @foreach ($applications as $application)
                        <tr>
                            <td>{{$application->id}}</td>
                            <td>{{$application->applicant_name}}</td>
                            <td>{{$application->vacancy->position_name}}</td>
                            <td>{{$application->created_at}}</td>
                            <td>@if ($application->status=='1')
                                {{"Applied"}}
                            @elseif($application->status=='2')
                            {{"On Review"}}
                            @elseif($application->status=='3')
                            {{"Interview"}}   
                            @elseif($application->status=='4')
                            {{"Hired"}}   
                            @else($application->status=='5')
                            {{"Rejected"}}  
                            @endif 
                           </td>
                           <td><div class="list-inline">
                        
                            <li><a href="{{route('applications.edit',$application->id)}}" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a></li>
                              <li><a href="#" id="" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" ><i class="fa fa-ban" aria-hidden="true"></i> </a></li>
                      </div>
                      </td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Applicant Name</th>
                        <th>Position</th>
                        <th>Date Applied</th>
                        <th>Status</th>
                        <th >Action</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
              
        
              
            
             
                  </div>
                  <!-- /.box-body -->
                </div>
        </div>
      </div>

{{--  
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          
          <div class="modal-content" >
            <form class="form-horizontal" method="post" action="{{route('applications.store')}}">
              {{csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Applicant Name</label>
    
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" name="applicant_name" placeholder="name">
                  </div>
                </div>
    
                <div class="form-group">
                  <label for="Position" class="col-sm-3 control-label">Position</label>
    
                  <div class="col-sm-9">
                    
                  
                  <select class="form-control" name="vacancy_id">
                  @foreach ($vacancies as $vacancy)
                  <option value="{{$vacancy->id}}">{{$vacancy->position_name}}</option>
                  @endforeach
                    
                  </select>
              
                  </div>
                </div>
                <!--date-->
                 <div class="form-group">
                <label for="date" class="col-sm-3 control-label">Application Date:</label>
    
                  <div class=" col-sm-9  ">
                 
    
                  <input type="date"  class=" form-control pull-right" id="datepicker" placeholder="Date">
                  
                  </div>
                  </div>
           
                <!-- /.input group -->
                
    
                 <!--end date-->
                <div class="form-group">
                  <label for="inputPassword3" name="status" class="col-sm-3 control-label">Status</label>
    
                  <div class="col-sm-9">
                    
                  
                  <select class="form-control" name="status">
                    <option value="1">Applied</option>
                    <option value="2">On Review</option>
                    <option value="3">Interview</option>
                    <option value="4">Hired</option>
                    <option value="5">Rejected</option>
                  </select>
              
                  </div>
                </div>
                <!-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-lg btn-primary fa fa-save"> Save</button>
                <!-- <button type="submit" class="btn btn-info btn-lg pull-right fa fa-save"> Save</button> -->
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
        </div>  --}}



        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Application</h4>
              </div>
              <form class="form-horizontal" method="post" action="{{route('applications.store')}}">
              <div class="modal-body">
               
                  {{csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-3 control-label">Applicant Name</label>
        
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="applicant_name" placeholder="name">
                      </div>
                    </div>
        
                    <div class="form-group">
                      <label for="Position" class="col-sm-3 control-label">Position</label>
        
                      <div class="col-sm-9">
                        
                      
                      <select class="form-control" name="vacancy_id">
                      @foreach ($vacancies as $vacancy)
                      <option value="{{$vacancy->id}}">{{$vacancy->position_name}}</option>
                      @endforeach
                        
                      </select>
                  
                      </div>
                    </div>
                    <!--date-->
                     <div class="form-group">
                    <label for="date" class="col-sm-3 control-label">Application Date:</label>
        
                      <div class=" col-sm-9  ">
                     
        
                      <input type="date"  class=" form-control pull-right" id="datepicker" placeholder="Date">
                      
                      </div>
                      </div>
               
                    <!-- /.input group -->
                    
        
                     <!--end date-->
                    <div class="form-group">
                      <label for="inputPassword3" name="status" class="col-sm-3 control-label">Status</label>
        
                      <div class="col-sm-9">
                        
                      
                      <select class="form-control" name="status">
                        <option value="1">Applied</option>
                        <option value="2">On Review</option>
                        <option value="3">Interview</option>
                        <option value="4">Hired</option>
                        <option value="5">Rejected</option>
                      </select>
                  
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> Remember me
                          </label>
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <!-- /.box-body -->
                 
               
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

            </div>
          </div>
        </div>








    </div>




@endsection