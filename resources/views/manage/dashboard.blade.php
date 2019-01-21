 @extends('new.layout') @section('content')

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">

      <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">
            <i class="fa fa-industry"></i> Total Companies</span>
          <div class="count">{{$totalCompanies}}</div>
          {{--
          <span class="count_bottom">
            <i class="green">4% </i> From last Week</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">
            <i class="fa fa-users"></i> Total Employess</span>
          <div class="count">{{$totalEmployees}}</div>
          {{--
          <span class="count_bottom">
            <i class="green">
              <i class="fa fa-sort-asc"></i>3% </i> From last Week</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">
            <i class="fa fa-user"></i> Total Departments</span>
          <div class="count green">{{$totalDepartments}}</div>
          {{--
          <span class="count_bottom">
            <i class="green">
              <i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">
            <i class="fa fa-user-circle"></i> Total Vacancies</span>
          <div class="count">{{$totalVacancies}}</div>
          {{--
          <span class="count_bottom">
            <i class="red">
              <i class="fa fa-sort-desc"></i>12% </i> From last Week</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">
            <i class="fa fa-clipboard"></i> Total Applications</span>
          <div class="count">{{$totalApplications}}</div>
          {{--
          <span class="count_bottom">
            <i class="green">
              <i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top">
            <i class="fa fa-flag"></i> Total Nationalities</span>
          <div class="count">{{$totalNationalities}}</div>
          {{--
          <span class="count_bottom">
            <i class="green">
              <i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
        </div>
      </div>



      <div class="clearfix"></div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Recent Activities </h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li>
                <a href="#">Settings 1</a>
              </li>
              <li>
                <a href="#">Settings 2</a>
              </li>
            </ul>
          </li>
          <li>
            <a class="close-link">
              <i class="fa fa-close"></i>
            </a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="dashboard-widget-content">

          <ul class="list-unstyled timeline widget">
          @if(count($logs)!=0)
            @foreach ($logs as $log)
            <li>
              <div class="block">
                <div class="block_content">
                  <h2 class="title">
                    <a>An Item was {{$log->description}}</a>
                  </h2>
                  <div class="byline">
                    <span>{{$log->created_at->diffForHumans()}}</span> by {{App\User::find($log->causer_id)->name}}
                    <a></a>
                  </div>

                </div>
              </div>
            </li>

            @endforeach
            @endif



          </ul>

          {{-- {!! $chart->html() !!} --}}

        </div>
      </div>
    </div>
  </div>


  <div class="col-md-8 col-sm-8 col-xs-12">
    <div class="row">
      <!-- Start to do list -->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>To Do List
              <small>Sample tasks</small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">Settings 1</a>
                  </li>
                  <li>
                    <a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="close-link">
                  <i class="fa fa-close"></i>
                </a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <div class="">
              <ul class="to_do">
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Schedule meeting with new client </p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Create email address for new intern</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Have IT fix the network printer</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Copy backups to offsite location</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Food truck fixie locavors mcsweeney</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Food truck fixie locavors mcsweeney</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Create email address for new intern</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Have IT fix the network printer</p>
                </li>
                <li>
                  <p>
                    <div class="icheckbox_flat-green" style="position: relative;">
                      <input class="flat" style="position: absolute; opacity: 0;" type="checkbox">
                      <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                    </div> Copy backups to offsite location</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- End to do list -->

      <!-- start of weather widget -->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daily Weather
              <small></small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li>
                <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#">Settings 1</a>
                  </li>
                  <li>
                    <a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li>
                <a class="close-link">
                  <i class="fa fa-close"></i>
                </a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="temperature">
                  <b>Monday</b>, 07:30 AM
                  <span>F</span>
                  <span>
                    <b>C</b>
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="weather-icon">
                  <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="weather-text">
                  <h2>Texas
                    <br>
                    <i>Partly Cloudy Day</i>
                  </h2>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="weather-text pull-right">
                <h3 class="degrees">23</h3>
              </div>
            </div>

            <div class="clearfix"></div>




            <div class="row weather-days">
              <div class="col-sm-2">
                <div class="daily-weather">
                  <h2 class="day">Mon</h2>
                  <h3 class="degrees">25</h3>
                  <canvas id="clear-day" width="32" height="32"></canvas>
                  <h5>15
                    <i>km/h</i>
                  </h5>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="daily-weather">
                  <h2 class="day">Tue</h2>
                  <h3 class="degrees">25</h3>
                  <canvas height="32" width="32" id="rain"></canvas>
                  <h5>12
                    <i>km/h</i>
                  </h5>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="daily-weather">
                  <h2 class="day">Wed</h2>
                  <h3 class="degrees">27</h3>
                  <canvas height="32" width="32" id="snow"></canvas>
                  <h5>14
                    <i>km/h</i>
                  </h5>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="daily-weather">
                  <h2 class="day">Thu</h2>
                  <h3 class="degrees">28</h3>
                  <canvas height="32" width="32" id="sleet"></canvas>
                  <h5>15
                    <i>km/h</i>
                  </h5>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="daily-weather">
                  <h2 class="day">Fri</h2>
                  <h3 class="degrees">28</h3>
                  <canvas height="32" width="32" id="wind"></canvas>
                  <h5>11
                    <i>km/h</i>
                  </h5>
                </div>
              </div>
              <div class="col-sm-2">
                <div class="daily-weather">
                  <h2 class="day">Sat</h2>
                  <h3 class="degrees">26</h3>
                  <canvas height="32" width="32" id="cloudy"></canvas>
                  <h5>10
                    <i>km/h</i>
                  </h5>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>

      </div>
      <!-- end of weather widget -->
    </div>
  </div>
</div>

{{-- {!! Charts::scripts() !!} {!! $chart->script() !!} --}} @endsection