 @include('partials._header')
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<!-- Main Header -->
		<header class="main-header">

			<!-- Logo -->
			<a href="index2.html" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini">
					<b>A</b>LT</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg">
					<b>HMRS</b>
				</span>
			</a>





			<!-- Header Navbar -->
			<nav class="navbar navbar-static-top" role="navigation">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

					<span class="sr-only">Toggle navigation</span>
				</a>

				<ul class="nav navbar-nav">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

						<span class="hidden-xs" class="text-center">
							<h4 style="color:white;">{{!empty(session('companyId'))? session('companyName') : "Select Company"}}
								<span class="caret"></span>
							</h4>

						</span>
					</a>
					<ul class="dropdown-menu">
						
							
						@foreach (all_companies() as $company)
						<li>
								<a href="{{route('manage.company', $company->id)}}">{{ $company->name }}</a>
							</li>
						@endforeach
				
						

					</ul>

				</ul>


				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<!-- Menu toggle button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="label label-success">4</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 4 messages</li>
								<li>
									<!-- inner menu: contains the messages -->
									<ul class="menu">
										<li>
											<!-- start message -->
											<a href="#">
												<div class="pull-left">
													<!-- User Image -->
													<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
												</div>
												<!-- Message title and timestamp -->
												<h4>
													Support Team
													<small>
														<i class="fa fa-clock-o"></i> 5 mins</small>
												</h4>
												<!-- The message -->
												<p>Why not buy a new awesome theme?</p>
											</a>
										</li>
										<!-- end message -->
									</ul>
									<!-- /.menu -->
								</li>
								<li class="footer">
									<a href="#">See All Messages</a>
								</li>
							</ul>
						</li>
						<!-- /.messages-menu -->

						<!-- Notifications Menu -->
						<li class="dropdown notifications-menu">
							<!-- Menu toggle button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="label label-warning">10</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>
									<!-- Inner Menu: contains the notifications -->
									<ul class="menu">
										<li>
											<!-- start notification -->
											<a href="#">
												<i class="fa fa-users text-aqua"></i> 5 new members joined today
											</a>
										</li>
										<!-- end notification -->
									</ul>
								</li>
								<li class="footer">
									<a href="#">View all</a>
								</li>
							</ul>
						</li>
						<!-- Tasks Menu -->
						<li class="dropdown tasks-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-flag-o"></i>
								<span class="label label-danger">9</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 9 tasks</li>
								<li>
									<!-- Inner menu: contains the tasks -->
									<ul class="menu">
										<li>
											<!-- Task item -->
											<a href="#">
												<!-- Task title and progress text -->
												<h3>
													Design some buttons
													<small class="pull-right">20%</small>
												</h3>
												<!-- The progress bar -->
												<div class="progress xs">
													<!-- Change the css width attribute to simulate progress -->
													<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">20% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
									</ul>
								</li>
								<li class="footer">
									<a href="#">View all tasks</a>
								</li>
							</ul>
						</li>
						<!-- User Account Menu -->
						<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<!-- The user image in the navbar-->
								<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
								<!-- hidden-xs hides the username on small devices so only the image appears. -->
								<span class="hidden-xs">Alexander Pierce</span>
							</a>
							<ul class="dropdown-menu">
								<!-- The user image in the menu -->
								<li class="user-header">
									<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

									<p>
										Alexander Pierce - Web Developer
										<small>Member since Nov. 2012</small>
									</p>
								</li>
								<!-- Menu Body -->
								<li class="user-body">
									<div class="row">
										<div class="col-xs-4 text-center">
											<a href="#">Followers</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Sales</a>
										</div>
										<div class="col-xs-4 text-center">
											<a href="#">Friends</a>
										</div>
									</div>
									<!-- /.row -->
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</div>
								</li>
							</ul>
						</li>
						<!-- Control Sidebar Toggle Button -->
						<li>
							<a href="#" data-toggle="control-sidebar">
								<i class="fa fa-gears"></i>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Alexander Pierce</p>
						<!-- Status -->
						<a href="#">
							<i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<!-- search form (Optional) -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->

				<!-- Sidebar Menu -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">Super Administrator</li>
					<!-- Optionally, you can add icons to the links -->
					<li class="{{Request::is('manage/dashboard')?"active":""}}">
						<a href="{{route('manage.dashboard')}}">
							<i class="fa fa-dashboard"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<li class="{{Request::is('manage/companies')?"active":""}}">
						<a href="{{route('companies.index')}}">
							<i class="fa fa-building-o"></i>
							<span>Companies Available</span>
						</a>
					</li>
					<li class="treeview menu-open">
						<a href="mailbox.html">
						  <i class="fa fa-envelope"></i> <span>Mailbox</span>
						  <span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						  </span>
						</a>
						<ul class="treeview-menu" style="">
						  <li>
							<a href="mailbox.html">Inbox
							  <span class="pull-right-container">
								<span class="label label-primary pull-right">13</span>
							  </span>
							</a>
						  </li>
						  <li><a href="compose.html">Compose</a></li>
						  <li class="active"><a href="read-mail.html">Read</a></li>
						</ul>
					  </li>
					@if (!empty(session('companyName')))
					<li class="header">{{session('companyName')}}</li>
					<li class="treeview {{Request::is('manage/departments')||Request::is('manage/qualifications')||Request::is('manage/work-stations')||Request::is('manage/leave-types')||Request::is('manage/banks')||Request::is('manage/nationality')||Request::is('manage/designations')||Request::is('manage/residential_area')||Request::is('manage/salary-scales')||Request::is('manage/allowances')? "active":""}}">
						<a href="#" >
							<i class="fa fa-industry"></i>
							<span>Company Setting</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu" >
							<li class="{{Request::is('manage/departments')? "active":""}}">
								<a href="{{route('departments.index')}}">
									<i class="fa  fa-circle-o"></i>Departments</a>
							</li>
							<li class="{{Request::is('manage/designations')?"active":""}}">
								<a href="{{route('designations.index')}}">
									<i class="fa  fa-circle-o"></i>Designations</a>
							</li>
							{{--  <li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Residetial Areas</a>
							</li>  --}}
						</li>
						<li class="{{Request::is('manage/salary-scales')?"active":""}}">
							<a href="{{route('salary-scales.index')}}">
									<i class="fa  fa-circle-o"></i>Salary Scale</a>
							</li>
							{{--  <li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Allowernces</a>
							</li>
							<li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Deductions</a>
							</li>  --}}
							<li class="{{Request::is('manage/banks')?"active":""}}">
								<a href="{{route('banks.index')}}">
									<i class="fa  fa-circle-o"></i>Banks</a>
							</li>
							<li class="{{Request::is('manage/nationality')?"active":""}}">
								<a href="{{route('nationality.index')}}">
									<i class="fa  fa-circle-o"></i>Nationalities</a>
							</li>
							<li class="{{Request::is('manage/leave-types')?"active":""}}">
								<a href="{{route('leave-types.index')}}">
									<i class="fa  fa-circle-o"></i>Leave Type</a>
							</li>
							<li class="{{Request::is('manage/qualifications')?"active":""}}">
								<a href="{{route('qualifications.index')}}">
									<i class="fa  fa-circle-o"></i>Qualifications</a>
							</li>
							<li class="{{Request::is('manage/work-stations')?"active":""}}">
								<a href="{{route('work-stations.index')}}">
									<i class="fa  fa-circle-o"></i>Work Stations</a>
							</li>
							{{--  <li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Licenes</a>
							</li>  --}}
							{{--  <li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Company Profile</a>
							</li>  --}}
						</ul>
					</li>

					<li class="treeview {{Request::is('manage/employees')||Request::is('manage/employees/create')||Request::is('manage/left-employees')?"active":""}}">
						<a href="#">
							<i class="fa fa-user"></i>
							<span>Employee</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="{{Request::is('manage/employees/create')?"active":""}}">
								<a href="{{route('employees.create')}}">
									<i class="fa  fa-circle-o"></i>Add Employee</a>
							</li>
							<li class="{{Request::is('manage/employees')?"active":""}}">
								<a href="{{route('employees.index')}}">
									<i class="fa  fa-circle-o"></i>List Employee</a>
							</li>
							<li class="{{Request::is('manage/left-employees')?"active":""}}">
								<a href="#">
									<i class="fa  fa-circle-o"></i>Left Employee</a>
							</li>

						</ul>
					</li>
					<li class="treeview {{Request::is('manage/vacancies/')||Request::is('manage/applications/')?"active":""}}">
						<a href="#">
							<i class="fa fa-users "></i>
							<span>Recruitment</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="{{Request::is('manage/vacancies/')?"active":""}}">
								<a href="{{route('vacancies.index')}}">
									<i class="fa  fa-circle-o"></i>Vacancies</a>
							</li>
							<li class="{{Request::is('manage/applications/')?"active":""}}">
								<a href="{{route('applications.show','1')}}">
									<i class="fa  fa-circle-o"></i>Applications</a>
							</li>
							<li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Field Students</a>
							</li>
							<li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>Intenships</a>
							</li>
							<li>
								<a href="#">
									<i class="fa  fa-circle-o"></i>volunters</a>
							</li>
						</ul>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-bolt"></i>
								<span>Training</span>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-book"></i>
								<span>Scholarship</span>
							</a>
						</li>
						<li class="treeview {{ Request::is('manage/users')|| Request::is('manage/roles') ? " active " : " "}}">
							<a href="#">
								<i class="fa fa-user-plus"></i>
								<span>User Management</span>
								<span class="pull-right-container">
									<i class="fa fa-angle-left pull-right"></i>
								</span>
							</a>
							<ul class="treeview-menu">
								<li>
									<a href="#">
										<i class="fa fa-circle-o"></i>
										<span>Permissions</span>
									</a>
								</li>
								<li class="{{ Request::is('manage/roles') ? " active " : " "}}">
									<a href="{{route('roles.index')}}">
										<i class="fa fa-circle-o"></i>
										<span>Roles</span>
									</a>
								</li>
								<li class="{{ Request::is('manage/users') ? " active " : " "}}">
									<a href="{{route('users.index')}}">
										<i class="fa fa-circle-o"></i>
										<span>Users</span>
									</a>
								</li>

							</ul>
						</li>
					@endif
					
				</ul>
				<!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					@yield('page_header')
					<small>@yield('discription')</small>
				</h1>
				<ol class="breadcrumb">
					<li>
						<a href="#">
							<i class="fa fa-dashboard"></i> Level</a>
					</li>
					<li class="active">Here</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content container-fluid">

				<!--------------------------
        | Your Page Content Here |
        -------------------------->


				@yield('content')

			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="pull-right hidden-xs">
				Anything you want
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2016
				<a href="#">Company</a>.</strong> All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li class="active">
					<a href="#control-sidebar-home-tab" data-toggle="tab">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<a href="#control-sidebar-settings-tab" data-toggle="tab">
						<i class="fa fa-gears"></i>
					</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane active" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:;">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

									<p>Will be 23 on April 24th</p>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

					<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:;">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="pull-right-container">
										<span class="label label-danger pull-right">70%</span>
									</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

				</div>
				<!-- /.tab-pane -->
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
				<!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
						<h3 class="control-sidebar-heading">General Settings</h3>

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Report panel usage
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>
								Some information about this general settings option
							</p>
						</div>
						<!-- /.form-group -->
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
		</aside>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	@include('partials._scripts')


</body>

</html>