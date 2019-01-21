 <!-- top navigation -->
 <div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="{{Auth::user()->hasRole('superadministrator')?asset('images/'.Auth::user()->image):asset('images/'.Auth::user()->employee->profile_photo)}}" alt="">{{Auth::user()->name}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="{{route('users.show',Auth::user()->id)}}"> Profile</a></li>
              <li>
                <a href="javascript:;">
                  <span class="badge bg-red pull-right">50%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
          </li>
          <li class="">
            @if (Auth::user()->hasRole('superadministrator'))
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                {{!empty(session('companyId'))? session('companyName') : "Select Company"}}
                <span class=" fa fa-angle-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu pull-right">
                	
						@foreach (all_companies() as $company)
						<li>
								<a href="{{route('manage.company', $company->id)}}">{{ $company->name }}</a>
							</li>
						@endforeach
              </ul>
            @else


            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              {{session('companyName')}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
                
{{--     
          <li>
              <a href="{{route('manage.company', $company->id)}}">{{ $company->name }}</a>
            </li>  --}}
       
            </ul>
              
            @endif
              
            </li>
  
          <li role="presentation" class="dropdown">
            <a href="javascript:;" id="markasread"  class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o"></i>
              @if (Auth::user()->unreadNotifications->count()!='0')
              <span class="badge bg-green">{{Auth::user()->unreadNotifications->count()}}</span>
              @endif
             
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              @foreach (Auth::user()->unreadNotifications as $notification)
              <li>
                  <a>
                    <span><i class="fa fa-suitcase"></i></span>
                    <span>
                      {{--  <span>{{App\Employee::findOrFail($notification->data['employee_id'])->first_name}}</span>  --}} Vampc
                      <span class="time">{{$notification->created_at->diffForHumans()}}</span>
                    </span>
                    <span class="message">
                     {{--  Has Requested For a {{class_basename($notification->type)}}  --}}
                     Has requested a leave {{$notification->data['leave_start_date']}}
                    </span>
                  </a>
                </li>
                  
              @endforeach
      
              
             
              <li>
                <div class="text-center">
                  <a>
                    <strong>See All Notifications</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>



          
        </ul>
      </nav>
    </div>
  </div>
  <!-- /top navigation -->


  @if (Session::has('success'))
   

<script>swal("Success!", "{{ Session::get('success') }}", "success");</script>
@endif
