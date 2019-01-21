<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">
              <i class="fa fa-university"></i>
              <span>HMPS</span>
            </a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{Auth::user()->hasRole('superadministrator')?asset('images/'.Auth::user()->image):asset('images/'.Auth::user()->employee->profile_photo)}}"
                alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>{{Auth::user()->name}}</h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            @role('superadministrator')
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li>
                  <a href="{{route('manage.admin')}}">
                    <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                  <a href="{{route('companies.index')}}">
                    <i class="fa fa-industry"></i> Companies</a>
                </li>
                <li>
                  <a href="{{route('manage.mail')}}">
                    <i class="fa fa-envelope"></i> Mail </a>
                </li>

                <li>
                  <a>
                    <i class="fa fa-gear"></i> Settings
                    <span class="fa fa-chevron-down"></span>
                  </a>

                </li>
                <li>
                  <a href="{{route('logs.index')}}">
                    <i class="fa fa-file"></i> Logs </a>

                </li>

            </div>
            @endrole @if (!empty(session('companyName')))



            <div class="menu_section">
              <h3>{{session('companyName')}}</h3>
              <ul class="nav side-menu">
                @if (!Auth::user()->hasRole('superadministrator'))
                <li>
                  <a href="{{route('companies.show',session('companyId'))}}">
                    <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                @endif


                <li>
                  <a>
                    <i class="fa fa-institution"></i> Company
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">


                    {{-- @if (!Auth::user()->hasRole('superadministrator'))
                    <li>
                      <a href="{{route('companies.show',session('companyId'))}}">Overview</a>
                    </li>
                    @endif --}}


                    <li>
                      <a href="{{route('departments.index')}}">Departments</a>
                    </li>
                    <li>
                      <a href="{{route('designations.index')}}">Designations</a>
                    </li>
                    <li>
                      <a href="{{route('salary-scales.index')}}">Salary Scale</a>
                    </li>
                    <li>
                      <a href="{{route('banks.index')}}">Banks</a>
                    </li>
                    <li>
                      <a href="{{route('nationality.index')}}">Nationalities</a>
                    </li>
                    <li>
                      <a href="{{route('leave-types.index')}}">Leave Types</a>
                    </li>
                    <li>
                      <a href="{{route('income-types.index')}}">Income Types</a>
                    </li>
                    <li>
                      <a href="{{route('deduction-types.index')}}">Dedution Types</a>
                    </li>
                    <li>
                      <a href="{{route('qualifications.index')}}">Qualifications</a>
                    </li>
                    <li>
                      <a href="{{route('work-stations.index')}}">Work Stations</a>
                    </li>
                    <li>
                      <a href="{{route('tax-table.index')}}">Tax Table</a>
                    </li>
                    <li>
                      <a href="{{route('social-securities.index')}}">Social Security</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a>
                    <i class="fa fa-users"></i> Employees
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="{{route('employees.index')}}">Employee list</a>
                    </li>
                    <li>
                      <a href="{{route('employees.create')}}">Add Employee</a>
                    </li>
                    <li>
                      <a href="{{route('employees.left')}}">Left Employees</a>
                    </li>

                  </ul>
                </li>
                <li>
                  <a href="{{route('loans.index')}}">
                    <i class="fa fa-money"></i> Loan Management</a>
                </li>
                <li>
                  <a href="{{route('leaves.show','0')}}">
                    <i class="fa fa-suitcase"></i> Leave Management </a>
                </li>

                <li>
                    <a>
                      <i class="fa fa-file-text-o"></i> Payroll
                      <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                    <li>
                        <a href="{{route('openPayPeriod.create')}}">Open Pay Period</a>
                      </li>
                      <li>
                        <a href="{{route('draft_payslips.index')}}">Create Paylist</a>
                      </li>
                      <li>
                        <a href="{{route('payslips.index')}}">Paylist List</a>
                      </li>
                      <li>
                        <a href="{{route('bankLetter.index')}}">Letter To Bank</a>
                      </li>
                     
  
                    </ul>
                  </li>

                  <li>
                    <a>
                      <i class="fa fa-files-o"></i> Reports
                      <span class="fa fa-chevron-down"></span>
                    </a>
                    <ul class="nav child_menu">
                      <li>
                        <a href="#">Payroll Register</a>
                      </li>
                      <li>
                        <a href="#">Cash listing</a>
                      </li>
                      <li>
                        <a href="{{route('ptens.index')}}">P10</a>
                      </li>
                      <li>
                        <a href="#">SDL</a>
                      </li>
                     
  
                    </ul>
                  </li>
                
                
                <li>
                  <a>
                    <i class="fa fa-user-circle-o"></i> Recruitment
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <li>
                      <a href="{{route('vacancies.index')}}">Vacancies</a>
                    </li>
                    <li>
                      <a href="{{route('applications.show','1')}}">Applications</a>
                    </li>
                    <li>
                      <a href="{{route('field-students.index')}}">Field Students</a>
                    </li>
                    <li>
                      <a href="{{route('interns.index')}}">Internships</a>
                    </li>
                    <li>
                      <a href="{{route('volunteers.index')}}">Volunteers</a>
                    </li>

                  </ul>
                </li>
                {{--
                <li>
                  <a>
                    <i class="fa fa-bolt"></i> Training </a>
                </li> --}}
                <li>
                  <a href="{{route('scholarships.index')}}">
                    <i class="fa fa-graduation-cap"></i> Scholarships</a>
                </li>
                <li>
                  <a>
                    <i class="fa fa-user-plus"></i> User Management
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    {{--
                    <li>
                      <a href="{{route('permissions.index')}}">Permissions</a>
                    </li> --}}
                    <li>
                      <a href="{{route('roles.index')}}">Roles and Permissions</a>
                    </li>
                    <li>
                      <a href="{{route('users.index')}}">Users</a>
                    </li>
                  </ul>
                </li>

            </div>


            @endif @if (!empty(session('companyName'))&&!empty(session('employeeId'))) @if(Auth::user()->can('view-personal-dashboard|view-personal-profile|request-leave'))
            <div class="menu_section">
              <h3>{{Auth::user()->name}}</h3>
              <ul class="nav side-menu">
                @endif @permission('view-personal-dashboard')
                <li>
                  <a href="#">
                    <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                @endpermission @permission('view-personal-profile')
                <li>
                  <a href="{{route('employees.show',session('employeeId'))}}">
                    <i class="fa fa-user"></i> Profile </a>
                </li>
                @endpermission @permission('request-leave')
                <li>
                  <a href="{{route('manage.employee.leave','0')}}">
                    <i class="fa fa-suitcase"></i> Leave </a>
                </li>
                @endpermission {{--
                <li>
                  <a>
                    <i class="fa fa-bolt"></i> Training </a>
                </li> --}} {{--
                <li>
                  <a href="{{route('scholarships.index')}}">
                    <i class="fa fa-graduation-cap"></i> Scholarships</a>
                </li> --}}


            </div>

            @endif



          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>

              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>