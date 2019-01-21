 @extends('new.layout') @section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Company Details </h2>
      <ul class="nav navbar-right panel_toolbox">



        <a href="{{route('companies.edit',$company->id)}}" type="button" class="btn btn-info">Edit Company</a>



      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">


      <ul class="nav nav-pills">
        <li class="active">
          <a data-toggle="pill" href="#home">Overview</a>
        </li>

        <li>
          <a data-toggle="pill" href="#menu2">General Information</a>
        </li>
        <li>
          <a data-toggle="pill" href="#menu3">Contact Information</a>
        </li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <p>
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-users"></i>
                  </div>
                  <div class="count">{{empty($company->employees->count())?"0":$company->employees->count()}}</div>
                  <h3>Employees</h3>
                  {{--
                  <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-institution"></i>
                  </div>
                  <div class="count">{{empty($company->departments->count())?"0":$company->departments->count()}}</div>
                  <h3>Departments</h3>
                  {{--
                  <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-id-card"></i>
                  </div>
                  <div class="count">{{empty($company->vacancies->count())?"0":$company->vacancies->count()}}</div>
                  <h3>Vacancies</h3>
                  {{--
                  <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon">
                    <i class="fa fa-suitcase"></i>
                  </div>
                  <div class="count">{{$leaveCount}}</div>
                  <h3>On Leave</h3>
                  {{--
                  <p>Lorem ipsum psdea itgum rixt.</p> --}}
                </div>
              </div>
            </div>
          </p>



          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Radar
                    <small>Sessions</small>
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
                  <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                  <canvas id="canvasRadar" style="width: 517px; height: 258px;" width="517" height="258"></canvas>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Employees per department
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
                  <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                  <canvas id="canvasDoughnut" style="width: 517px; height: 258px;" width="517" height="258"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-12 widget widget_tally_box">
            <div class="x_panel ui-ribbon-container">

              <div class="x_title">
                <h2>Settings Completion</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div style="text-align: center; margin-bottom: 17px">
                  <span class="chart" data-percent="{{$percentage}}">
                    <span class="percent">{{$percentage}}</span>
                    <canvas height="110" width="110"></canvas>
                  </span>
                </div>

                <h3 class="name_title">@if($percentage==100)
                Settings Completed
                @else 
                Settings Not Completed
                @endif

                </h3>
                

                <div class="divider"></div>

                <ul class="list-unstyled">
                 
                  <li>
                  <a href="#">
                  <h5><i class="fa {{$department_count!=0?"fa-check":"fa-close"}}"></i> Deparment({{$department_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa {{$designation_count!=0?"fa-check":"fa-close"}}"></i> Designation({{$designation_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$salaryscale_count!=0?"fa-check":"fa-close"}}"></i> Salary Scale({{$salaryscale_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$bank_count!=0?"fa-check":"fa-close"}}"></i> Bank({{$bank_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$nationality_count!=0?"fa-check":"fa-close"}}"></i> Nationality({{$nationality_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$leavetype_count!=0?"fa-check":"fa-close"}}"></i> Leave Type({{$leavetype_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$qualification_count!=0?"fa-check":"fa-close"}}"></i> Qualification({{$qualification_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$workstation_count!=0?"fa-check":"fa-close"}}"></i> Workstation({{$workstation_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$taxtable_count!=0?"fa-check":"fa-close"}}"></i> Tax Range({{$taxtable_count}})</h5>
                  </a>
                </li>
                <li>
                  <a href="#">
                  <h5><i class="fa  {{$socialsecurity_count!=0?"fa-check":"fa-close"}}"></i> Social Security({{$socialsecurity_count}})</h5>
                  </a>
                </li>
                </ul>

              </div>
            </div>

          
             </div>

              <div class="col-md-9">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Calendar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                   <div id="calendar" class="fc fc-unthemed fc-ltr"><div class="fc-toolbar fc-header-toolbar"><div class="fc-left"><div class="fc-button-group"><button type="button" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button></div><button type="button" class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right fc-state-disabled" disabled="">today</button></div><div class="fc-right"><div class="fc-button-group"><button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button type="button" class="fc-agendaWeek-button fc-button fc-state-default">week</button><button type="button" class="fc-agendaDay-button fc-button fc-state-default">day</button><button type="button" class="fc-listMonth-button fc-button fc-state-default fc-corner-right">list</button></div></div><div class="fc-center"><h2>February 2018</h2></div><div class="fc-clear"></div></div><div class="fc-view-container" style=""><div class="fc-view fc-month-view fc-basic-view" style=""><table><thead class="fc-head"><tr><td class="fc-head-container fc-widget-header"><div class="fc-row fc-widget-header"><table><thead><tr><th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th><th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th><th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th><th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th><th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th><th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th><th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th></tr></thead></table></div></td></tr></thead><tbody class="fc-body"><tr><td class="fc-widget-content"><div class="fc-scroller fc-day-grid-container" style="overflow: hidden; height: 636px;"><div class="fc-day-grid fc-unselectable"><div class="fc-row fc-week fc-widget-content" style="height: 106px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-past" data-date="2018-01-28"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-past" data-date="2018-01-29"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-past" data-date="2018-01-30"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-past" data-date="2018-01-31"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-02-01"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-02-02"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-02-03"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-past" data-date="2018-01-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-mon fc-other-month fc-past" data-date="2018-01-29"><span class="fc-day-number">29</span></td><td class="fc-day-top fc-tue fc-other-month fc-past" data-date="2018-01-30"><span class="fc-day-number">30</span></td><td class="fc-day-top fc-wed fc-other-month fc-past" data-date="2018-01-31"><span class="fc-day-number">31</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-02-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-02-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-02-03"><span class="fc-day-number">3</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">All Day Event</span></div></a></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 106px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-02-04"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-02-05"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-02-06"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-02-07"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-02-08"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-02-09"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-02-10"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-02-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-02-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-02-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-02-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-02-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-02-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-02-10"><span class="fc-day-number">10</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 106px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-02-11"></td><td class="fc-day fc-widget-content fc-mon fc-past" data-date="2018-02-12"></td><td class="fc-day fc-widget-content fc-tue fc-past" data-date="2018-02-13"></td><td class="fc-day fc-widget-content fc-wed fc-past" data-date="2018-02-14"></td><td class="fc-day fc-widget-content fc-thu fc-past" data-date="2018-02-15"></td><td class="fc-day fc-widget-content fc-fri fc-past" data-date="2018-02-16"></td><td class="fc-day fc-widget-content fc-sat fc-past" data-date="2018-02-17"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-02-11"><span class="fc-day-number">11</span></td><td class="fc-day-top fc-mon fc-past" data-date="2018-02-12"><span class="fc-day-number">12</span></td><td class="fc-day-top fc-tue fc-past" data-date="2018-02-13"><span class="fc-day-number">13</span></td><td class="fc-day-top fc-wed fc-past" data-date="2018-02-14"><span class="fc-day-number">14</span></td><td class="fc-day-top fc-thu fc-past" data-date="2018-02-15"><span class="fc-day-number">15</span></td><td class="fc-day-top fc-fri fc-past" data-date="2018-02-16"><span class="fc-day-number">16</span></td><td class="fc-day-top fc-sat fc-past" data-date="2018-02-17"><span class="fc-day-number">17</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td class="fc-event-container" colspan="3"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Long Event</span></div></a></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 106px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-past" data-date="2018-02-18"></td><td class="fc-day fc-widget-content fc-mon fc-today fc-state-highlight" data-date="2018-02-19"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2018-02-20"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2018-02-21"></td><td class="fc-day fc-widget-content fc-thu fc-future" data-date="2018-02-22"></td><td class="fc-day fc-widget-content fc-fri fc-future" data-date="2018-02-23"></td><td class="fc-day fc-widget-content fc-sat fc-future" data-date="2018-02-24"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-past" data-date="2018-02-18"><span class="fc-day-number">18</span></td><td class="fc-day-top fc-mon fc-today fc-state-highlight" data-date="2018-02-19"><span class="fc-day-number">19</span></td><td class="fc-day-top fc-tue fc-future" data-date="2018-02-20"><span class="fc-day-number">20</span></td><td class="fc-day-top fc-wed fc-future" data-date="2018-02-21"><span class="fc-day-number">21</span></td><td class="fc-day-top fc-thu fc-future" data-date="2018-02-22"><span class="fc-day-number">22</span></td><td class="fc-day-top fc-fri fc-future" data-date="2018-02-23"><span class="fc-day-number">23</span></td><td class="fc-day-top fc-sat fc-future" data-date="2018-02-24"><span class="fc-day-number">24</span></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">10:30a</span> <span class="fc-title">Meeting</span></div></a></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">7p</span> <span class="fc-title">Birthday Party</span></div></a></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 106px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-future" data-date="2018-02-25"></td><td class="fc-day fc-widget-content fc-mon fc-future" data-date="2018-02-26"></td><td class="fc-day fc-widget-content fc-tue fc-future" data-date="2018-02-27"></td><td class="fc-day fc-widget-content fc-wed fc-future" data-date="2018-02-28"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2018-03-01"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2018-03-02"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2018-03-03"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-future" data-date="2018-02-25"><span class="fc-day-number">25</span></td><td class="fc-day-top fc-mon fc-future" data-date="2018-02-26"><span class="fc-day-number">26</span></td><td class="fc-day-top fc-tue fc-future" data-date="2018-02-27"><span class="fc-day-number">27</span></td><td class="fc-day-top fc-wed fc-future" data-date="2018-02-28"><span class="fc-day-number">28</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2018-03-01"><span class="fc-day-number">1</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2018-03-02"><span class="fc-day-number">2</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2018-03-03"><span class="fc-day-number">3</span></td></tr></thead><tbody><tr><td></td><td></td><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable" href="http://google.com/"><div class="fc-content"><span class="fc-time">12a</span> <span class="fc-title">Click for Google</span></div></a></td><td></td><td></td><td></td></tr></tbody></table></div></div><div class="fc-row fc-week fc-widget-content" style="height: 106px;"><div class="fc-bg"><table><tbody><tr><td class="fc-day fc-widget-content fc-sun fc-other-month fc-future" data-date="2018-03-04"></td><td class="fc-day fc-widget-content fc-mon fc-other-month fc-future" data-date="2018-03-05"></td><td class="fc-day fc-widget-content fc-tue fc-other-month fc-future" data-date="2018-03-06"></td><td class="fc-day fc-widget-content fc-wed fc-other-month fc-future" data-date="2018-03-07"></td><td class="fc-day fc-widget-content fc-thu fc-other-month fc-future" data-date="2018-03-08"></td><td class="fc-day fc-widget-content fc-fri fc-other-month fc-future" data-date="2018-03-09"></td><td class="fc-day fc-widget-content fc-sat fc-other-month fc-future" data-date="2018-03-10"></td></tr></tbody></table></div><div class="fc-content-skeleton"><table><thead><tr><td class="fc-day-top fc-sun fc-other-month fc-future" data-date="2018-03-04"><span class="fc-day-number">4</span></td><td class="fc-day-top fc-mon fc-other-month fc-future" data-date="2018-03-05"><span class="fc-day-number">5</span></td><td class="fc-day-top fc-tue fc-other-month fc-future" data-date="2018-03-06"><span class="fc-day-number">6</span></td><td class="fc-day-top fc-wed fc-other-month fc-future" data-date="2018-03-07"><span class="fc-day-number">7</span></td><td class="fc-day-top fc-thu fc-other-month fc-future" data-date="2018-03-08"><span class="fc-day-number">8</span></td><td class="fc-day-top fc-fri fc-other-month fc-future" data-date="2018-03-09"><span class="fc-day-number">9</span></td><td class="fc-day-top fc-sat fc-other-month fc-future" data-date="2018-03-10"><span class="fc-day-number">10</span></td></tr></thead><tbody><tr><td></td><td class="fc-event-container"><a class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable"><div class="fc-content"><span class="fc-time">12p</span> <span class="fc-title">Lunch</span></div></a></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table></div></div></div></div></td></tr></tbody></table></div></div></div>

                  </div>
                </div>
              </div>
            


       </div>



          <div id="menu2" class="tab-pane fade">
            <div class="x_content">

              <table class="table">

                <tbody>
                  <tr>
                    <th scope="row">Logo</th>
                    <td>
                      <img src="{{!empty($company->logo)?asset('images/'.$company->logo):asset('images/companylogo.png')}}" class="media-object"
                        style="width:150px">
                    </td>

                  </tr>
                  <tr>
                    <th scope="row">Company Name</th>
                    <td>{{$company->name}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Headquaters</th>
                    <td>{{$company->hq}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Founder</th>
                    <td>{{$company->founder}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Founded</th>
                    <td>{{$company->founded}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Website</th>
                    <td>{{$company->website}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Industry</th>
                    <td>{{$company->industry_type}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Description</th>
                    <td>{{$company->description}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Mission</th>
                    <td>{{$company->mission}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Values</th>
                    <td>{{$company->value}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Visions</th>
                    <td>{{$company->vision}}</td>

                  </tr>


                </tbody>
              </table>

            </div>
          </div>
          <div id="menu3" class="tab-pane fade">
            <div class="x_content">

              <table class="table">

                <tbody>
                  <tr>
                    <th scope="row">Email</th>
                    <td>{{$company->email}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Phone</th>
                    <td>{{$company->phone}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Fax</th>
                    <td>{{$company->fax}}</td>

                  </tr>

                  <tr>
                    <th scope="row">Postal Address</th>
                    <td>{{$company->postal_address}}</td>

                  </tr>
                  <tr>
                    <th scope="row">Physical Address</th>
                    <td>{{$company->physical_address}}</td>

                  </tr>

                  <tr>
                    <th scope="row">address1</th>
                    <td>{{$company->address1}}</td>

                  </tr>

                  <tr>
                    <th scope="row">address2</th>
                    <td>{{$company->address2}}</td>

                  </tr>

                  <tr>
                    <th scope="row">address3</th>
                    <td>{{$company->address3}}</td>

                  </tr>



                </tbody>
              </table>

            </div>
          </div>
        </div>





      </div>
    </div>



  </div>








  @endsection