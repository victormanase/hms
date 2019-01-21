 @extends('new.layout') @section('content')

<div class="row">
  @include('partials._messages')
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Personal Details</h2>
        <ul class="nav navbar-right panel_toolbox">

        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br>
        <form id="demo-form2" method="post" data-parsley-validate="" class="form-horizontal form-label-left" action='{{route('employees.store')}}' enctype="multipart/form-data" novalidate="">
          {{csrf_field()}}
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" required="required" name="first_name" value="{{old('first_name')}}" class="form-control col-md-7 col-xs-12"
                type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Middle Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" required="required" name="middle_name" value="{{old('middle_name')}}" class="form-control col-md-7 col-xs-12"
                type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="last-name" required="required" value="{{old('last_name')}}" class="form-control col-md-7 col-xs-12" name="last_name"
                type="text">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone Number
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="last-name" required="required" value="{{old('phone_number')}}" class="form-control col-md-7 col-xs-12" name="phone_number"
                type="text">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div id="gender" class="btn-group" data-toggle="buttons">
                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input name="gender" value="1" data-parsley-multiple="gender" type="radio"> &nbsp; Male &nbsp;
                </label>
                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                  <input name="gender" value="0" data-parsley-multiple="gender" type="radio"> Female
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{old('DOB')}}" name="DOB" required="required"
                type="date">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationality</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="nationality_id">
                <option value="">**Please select Nationality</option>
                @foreach ($nationalities as $nationality)
                <option value="{{$nationality->id}} ">{{$nationality->nationality_name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control ">
                <option value="">**Please select Country</option>
                @foreach ($countries as $country)
                <option value="{{$country->id}} ">{{$country->country_name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Region</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control ">
                <option value="">**Please select Region</option>
                @foreach ($regions as $region)
                <option value="{{$region->id}} ">{{$region->region_name}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">District</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control ">
                <option value="">**Please select District</option>
                @foreach ($districts as $district)
                <option value="{{$district->id}} ">{{$district->district_name}}</option>
                @endforeach
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control " name="marital_status">
                <option> **Please Select Marital Status </option>
                <option value="1">Married</option>
                <option value="0">Single</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Picture
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" class="form-control col-md-7 col-xs-12" type="file" name="profile_photo">
            </div>
          </div>
          <span class="section">Employement Details</span>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control " name="department_id">
                <option value="">**Please select department </option>
                @foreach ($departments as $department) {
                <option value="{{$department->id}}">{{$department->department_name}}</option>
                @endforeach
              </select>
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control " name="designation_id">
                <option value="">**Please select Designation </option>
                {{-- @foreach ($designations as $designation)
                <option value="{{$designation->id}} "> {{$designation->designation_name}}</option>
                @endforeach --}}
              </select>
            </div>
            <div class="col-md-2">
              <span id="loader1">
                <i class="fa fa-spinner fa-3x fa-spin"></i>
              </span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Workstation</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control ">
                <option value="">**Please select workstation </option>
                @foreach ($workstations as $workstation) {
                <option value="{{$workstation->id}}">{{$workstation->name}}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control " name="status">
                <option value="">**Select Status </option>
                <option value="Active">Active</option>
                <option value="Retired">Retired</option>
                <option value="Terminated">Terminated</option>
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Qualifications</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control ">
                <option value="">**Please select Qualifications </option>
                @foreach ($qualifications as $qualification)
                <option value="{{$qualification->qualification_id}} "> {{$qualification->qualification_name}}</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">License
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" class="form-control col-md-7 col-xs-12" type="file" name="licence">
            </div>
          </div>




          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">License Expiry Date
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{old('licence_expiry')}}" name="licence_expiry"
                type="date">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contract
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" class="form-control col-md-7 col-xs-12" type="file" name="contract">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Basic Salary
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="first-name" class="form-control col-md-7 col-xs-12" type="text  " value="{{old('basic_salary')}}" name="basic_salary">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Begin Date
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{old('begin_date')}}" name="begin_date"
                type="date">
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" value="{{old('end_date')}}" name="end_date" type="date">
            </div>
          </div>

          <span class="section">Bank Details</span>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control " name="bank_id">
                <option value="">**Please select Bank </option>
                @foreach ($banks as $bank)
                <option value="{{ $bank->id}} "> {{$bank->bank_name}} </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Branch Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="branch" class="form-control col-md-7 col-xs-12" value="{{old('branch')}}" type="text">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account Number
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="branch" class="form-control col-md-7 col-xs-12" value="{{old('account_number')}}" name="account_number" type="text">
            </div>
          </div>

          <span class="section">Social Security Details</span>


                  <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Social Security Name</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control " name="social_security_id">
                <option value="">**Please select Social Security Fund </option>
                @foreach ($socialSecurities as $socialSecurity)
                <option value="{{$socialSecurity->id}}"> {{$socialSecurity->name}} </option>
                @endforeach
              </select>
            </div>
          </div>
            
        

        
         
          






          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
















@endsection