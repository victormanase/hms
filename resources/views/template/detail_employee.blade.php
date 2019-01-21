<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'></div>
    <div class='panel-body'>
        <div class='form-group'>

          <p>{{$row->name}}</p>
        </div>




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">




  <div class="container">
    <h2>&nbsp;</h2>

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#PersonalDetails">Personal Details</a></li>
      <li><a data-toggle="tab" href="#CompanyDetails">Employement Details</a></li>
      <li><a data-toggle="tab" href="#BankAccountDetails">Bank Account Details</a></li>
      <li><a data-toggle="tab" href="#Documents">Others</a></li>
    </ul>

    <div class="tab-content">
      <div id="PersonalDetails"class="tab-pane fade in active">
        <table class="table">
      <thead>
        <tr>
          <td>Photo</td>
          <td>&nbsp;</td>

        </tr>
      </thead>
      <tbody>
        <tr>
          <td>First Name</td>
          <td>{{$row->first_name}}</td>

        </tr>
        <tr>
          <td>Last Name</td>
          <td>{{$row->last_name}}</td>

        </tr>
        <tr>
          <td>Gender</td>
          <td>{{$row->gender}}</td>

        </tr>

        <tr>
          <td>Marital Status</td>
          <td>{{$row->marital_status}}</td>

        </tr>
        <tr>
          <td>Nationality</td>
          <td>{{$row->nationality}}</td>

        </tr>
        <tr>
          <td>Phone</td>
          <td>{{$row->phone}}</td>

        </tr>
        <tr>
          <td>Residential Area</td>
          <td>{{$row->district}},{{$row->region}},{{$row->country}}</td>

        </tr>



      </tbody>
    </table>
      </div>
      <div id="CompanyDetails"class="tab-pane fade">
        <table class="table">
      <thead>
        <tr>
          <td>Department</td>
          <td>{{$row->department}}</td>


        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Designation</td>
          <td>{{$row->designation}}</td>

        </tr>
        <tr>
          <td>Basic Salary</td>
          <td>{{$row->basic_salary}}</td>

        </tr>


        <tr>
          <td>Status</td>
          <td>{{$row->Status}}</td>
        </tr>
      </tbody>
    </table>
      </div>
      <div id="BankAccountDetails"class="tab-pane fade">
        <table class="table">
      <thead>

      </thead>
      <tbody>
        <tr>
          <td>Account Number</td>
          <td>{{$row->account_number}}</td>
         </tr>
        <tr>
          <td>Bank Name</td>
          <td>{{$row->bank_name}}</td>

        </tr>
        <tr>
          <td>Branch</td>
          <td>{{$row->bank_branch}}</td>

        </tr>
      </tbody>
    </table>
      </div>
      <div id="Documents" class="tab-pane fade">

      </div>
    </div>



      </form>
    </div>
  </div>
@endsection