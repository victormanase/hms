

@extends('new.layout')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Employee Details</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      <div class="col-xs-3">
        <!-- required for floating -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Personal Information</a>
          </li>
          <li class=""><a href="#profile" data-toggle="tab" aria-expanded="true">Bank Information</a>
          </li>
          <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Employement Information</a>
          </li>
          <li class=""><a href="#system" data-toggle="tab" aria-expanded="false">Other</a>
          </li>
        </ul>
      </div>

      <div class="col-xs-9">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="home">
           
           
            <div class="x_content">

                <table class="table">
                 
                  <tbody>
                      <tr>
                          <th scope="row">Photo</th>
                          <td>Mark</td>
                          
                        </tr>
                    <tr>
                      <th scope="row">First Name</th>
                      <td>Mark</td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Last Name</th>
                      <td>Jacob</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Gender</th>
                      <td>Jacob</td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Marital Status</th>
                      <td>Jacob</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Phone</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Date of Birth</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Nationality</th>
                      <td>Website</td>
                      
                    </tr>

                  
              
              
                  </tbody>
                </table>

              </div>
          
      
          </div>
          <div class="tab-pane" id="profile">
            <div class="col-md-12 col-sm-12 col-xs-12">
          
         
              <div class="x_content">

                <table class="table">
                 
                  <tbody>
                     
                    <tr>
                      <th scope="row">Bank</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Branch</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Account Number</th>
                      <td>Website</td>
                      
                    </tr>

                   
              
                  </tbody>
                </table>

              </div>
          
          </div></div>
          <div class="tab-pane" id="messages"> <div class="x_content">

              <table class="table">
               
                <tbody>
                    <tr>
                        <th scope="row">Department</th>
                        <td>Mark</td>
                        
                      </tr>
                  <tr>
                    <th scope="row">Designation</th>
                    <td>Mark</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td>Jacob</td>
                    
                  </tr>

                  <tr>
                    <th scope="row">Start Date</th>
                    <td>Jacob</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">End Date</th>
                    <td>Jacob</td>
                    
                  </tr>


            
            
                </tbody>
              </table>

            </div>
        
        </div>
      
        <div class="tab-pane" id="system"> <div class="x_content">

            <table class="table">
             
              <tbody>
                  <tr>
                      <th scope="row">Email</th>
                      <td>Mark</td>
                      
                    </tr>
                <tr>
                  <th scope="row">Role</th>
                  <td>Mark</td>
                  
                </tr>
                <tr>
                  <th scope="row">Permissions</th>
                  <td>Jacob</td>
                  
                </tr>

                


          
          
              </tbody>
            </table>

          </div>
      
      </div>
      
      
      
      </div></div>
          
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>




  @endsection