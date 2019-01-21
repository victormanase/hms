
@extends('new.layout')
@section('content')

@include('partials._messages')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Edit Loan</small></h2>
          <ul class="nav navbar-right panel_toolbox">
           
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br>
          <form class="form-horizontal" method="post" action="{{route('loans.update',$loan->id)}}">
           
               <input type="hidden" name="_method" value="PUT">
                  {{csrf_field() }}
                
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control " name="employee_id">
                          <option value="">**Please select Employee </option>
                          @foreach ($employees as $employee) { 
                            <option value="{{$employee->id}}" selected="{{$loan->employee_id==$employee->id}}">{{$employee->first_name}} {{" " }}  {{$employee->last_name}}</option>
                         @endforeach
                      </select>
                    </div>
                  </div>
                  
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Loan Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="first-name" required="required"  name="name" value="{{$loan->name}}" class="form-control col-md-7 col-xs-12" type="text">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="first-name" required="required"  name="amount" value="{{$loan->amount}}" class="form-control col-md-7 col-xs-12" type="number">
                  </div>
                </div>
               
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Monthlty Deduction <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="first-name" required="required"  name="rate" value="{{$loan->rate}}" class="form-control col-md-7 col-xs-12" type="number">
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