 @include('partials._header')
 @include('new._header')

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="">
				<b>Logo</b>
			</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>
			@if ($errors->any())
			<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Login Failed!</h4>
               Incorrect Email/Password combination
              </div>
			@endif
			

			<form action="{{route('login')}}" method="POST">
				{{ csrf_field() }}
				<div class="form-group {{ $errors->has('email') ? ' has-error' : 'feedback' }}">
					<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<input id="password" type="password" class="form-control" name="password" required placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<a href="{{ route('password.request') }}">I forgot my password</a>
			<br>


		</div>
		<!-- /.login-box-body -->
	</div>


	<div class="col-md-5 col-md-offset-4 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Assistive Form Fill <span class="label label-danger">DEMO ONLY</span></h2>
			<ul class="nav navbar-right panel_toolbox">
			  
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">

			<table class="table">
			  <thead>
				<tr>
				  <th>#</th>
				  <th>Email</th>
				  <th>Password</th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>superadministrator@app.com</td>
				  <td>password</td>
				  <td><button type="button" id="btn1" class="btn btn-default">Fill</button></td>
				</tr>
				<tr>
				  <th scope="row">2</th>
				  <td>administrator@app.com</td>
				  <td>password</td>
				  <td><button type="button" id="btn2" class="btn btn-default">Fill</button></td>
				</tr>
				{{--  <tr>
				  <th scope="row">3</th>
				  <td>hr@app.com</td>
				  <td>password</td>
				  <td><button type="button" id="btn3" class="btn btn-default">Fill</button></td>
				</tr>
				<tr>
					<th scope="row">4</th>
					<td>departmentsupervisor@app.com</td>
					<td>password</td>
					<td><button type="button" id="btn4" class="btn btn-default">Fill</button></td>
				  </tr>  --}}

				  <tr>
					<th scope="row">5</th>
					<td>employee@app.com</td>
					<td>password</td>
					<td><button type="button" id="btn5" class="btn btn-default">Fill</button></td>
				  </tr>
			  </tbody>
			</table>

		  </div>
		</div>
	  </div>
	<!-- /.login-box -->




	@include('partials._scripts')