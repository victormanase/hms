
  @include('new._header')
 @include('new._sidebar')
 @include('new._topbar')

           

       
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            {{--  pagetitle   --}}

            <div class="clearfix"></div>

        @yield('content')
          </div>
        </div>
        <!-- /page content -->

       {{--  footer  --}}
       @include('new._footer')
     
@include('new._scripts')
