

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Departments</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-default">Add New Department</a>


          <div class="x_content">

            <!-- modals -->
            <!-- Large modal -->
           

          

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-md">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">New Department</h4>
                  </div>
                 
                  <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Department Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required"  name="department_name" class="form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>
            </div>
            <!-- /modals -->
          </div>
          
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <p>Simple table with project listing with progress and editing options</p>

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Department Name</th>
              <th>Supervisor</th>
              <th>Total Employees</th>
             
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#</td>
              <td>
                <a>Pesamakini Backend UI</a>
                <br>
                <small>Registered 01.01.2015</small>
              </td>
              <td>
                <ul class="list-inline">
                  <li>
                    <img src="images/user.png" class="avatar" alt="Avatar">
                  </li>
                  <li>
                    <img src="images/user.png" class="avatar" alt="Avatar">
                  </li>
                  <li>
                    <img src="images/user.png" class="avatar" alt="Avatar">
                  </li>
                  <li>
                    <img src="images/user.png" class="avatar" alt="Avatar">
                  </li>
                </ul>
              </td>
              <td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57" style="width: 57%;" aria-valuenow="56"></div>
                </div>
                <small>57% Complete</small>
              </td>
             
              <td>
               
                <a href="{{route('companies.index')}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            <tr>
              <td>#</td>
              <td>
                <a>Pesamakini Backend UI</a>
                <br>
                <small>Registered 01.01.2015</small>
              </td>
              <td>
                <ul class="list-inline">
                  <li>
                    <img src="images/user.png" class="avatar" alt="Avatar">
                  </li>
                  <li>
                    <img src="images/user.png" class="avatar" alt="Avatar">
                  </li>
                </ul>
              </td>
              <td class="project_progress">
                <div class="progress progress_sm">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="47" style="width: 47%;" aria-valuenow="46"></div>
                </div>
                <small>47% Complete</small>
              </td>
              
              <td>
               
                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </a>
              </td>
            </tr>
            
          </tbody>
        </table>
        <!-- end project list -->

      </div>
    </div>
  </div>
</div>


  @endsection