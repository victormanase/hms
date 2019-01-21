

@extends('new.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Employees</h2>
          <ul class="nav navbar-right panel_toolbox">
            <a href="" type="button" class="btn btn-default">Add Employee</a>
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
                <th style="width: 20%">Name</th>
                <th>Designation</th>
                <th>Age</th>
                <th>Start Date</th>
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
                  <button type="button" class="btn btn-success btn-xs">Success</button>
                </td>
                <td>
                  <a href="" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                  <a href="" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
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
                  <button type="button" class="btn btn-success btn-xs">Success</button>
                </td>
                <td>
                  <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
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