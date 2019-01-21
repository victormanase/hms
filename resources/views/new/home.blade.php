

@extends('new.layout')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float left</small></h2>
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
          <li class=""><a href="#home" data-toggle="tab" aria-expanded="false">Overview</a>
          </li>
          <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">General Information</a>
          </li>
          <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Contact Information</a>
          </li>
          <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Other</a>
          </li>
        </ul>
      </div>

      <div class="col-xs-9">
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane" id="home">
            <p class="lead">Overview</p>
            <p><div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users"></i></div>
                  <div class="count">179</div>
                  <h3>Employees</h3>
                  {{--  <p>Lorem ipsum psdea itgum rixt.</p>  --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-institution"></i></div>
                  <div class="count">179</div>
                  <h3>Departments</h3>
                  {{--  <p>Lorem ipsum psdea itgum rixt.</p>  --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-id-card"></i></div>
                  <div class="count">179</div>
                  <h3>Vacancies</h3>
                  {{--  <p>Lorem ipsum psdea itgum rixt.</p>  --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">179</div>
                  <h3>Volunteers</h3>
                  {{--  <p>Lorem ipsum psdea itgum rixt.</p>  --}}
                </div>
              </div>
            </div></p>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Radar <small>Sessions</small></h2>
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
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="canvasRadar" style="width: 517px; height: 258px;" width="517" height="258"></canvas>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employees per department <small></small></h2>
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
                  <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="canvasDoughnut" style="width: 517px; height: 258px;" width="517" height="258"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane active" id="profile"><div class="col-md-12 col-sm-12 col-xs-12">
          
         
              <div class="x_content">

                <table class="table">
                 
                  <tbody>
                      <tr>
                          <th scope="row">Logo</th>
                          <td>Mark</td>
                          
                        </tr>
                    <tr>
                      <th scope="row">Name</th>
                      <td>Mark</td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Headquaters</th>
                      <td>Jacob</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Founder</th>
                      <td>Jacob</td>
                      
                    </tr>
                    <tr>
                      <th scope="row">Founded</th>
                      <td>Jacob</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Founded</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Industry</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Description</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Motto</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Values</th>
                      <td>Website</td>
                      
                    </tr>

                    <tr>
                      <th scope="row">Visions</th>
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
                        <th scope="row">Email</th>
                        <td>Mark</td>
                        
                      </tr>
                  <tr>
                    <th scope="row">Phone</th>
                    <td>Mark</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Fax</th>
                    <td>Jacob</td>
                    
                  </tr>

                  <tr>
                    <th scope="row">Postal Address</th>
                    <td>Jacob</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Physical Address</th>
                    <td>Jacob</td>
                    
                  </tr>

                  <tr>
                    <th scope="row">Address1</th>
                    <td>Website</td>
                    
                  </tr>

                  <tr>
                    <th scope="row">Address2</th>
                    <td>Website</td>
                    
                  </tr>

                  <tr>
                    <th scope="row">Address3</th>
                    <td>Website</td>
                    
                  </tr>

            
            
                </tbody>
              </table>

            </div>
        
        </div></div></div>
          
        </div>
      </div>

      <div class="clearfix"></div>

    </div>
  </div>
</div>




  @endsection