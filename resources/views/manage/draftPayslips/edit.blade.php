

@extends('new.layout')
@section('content')


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Empoyee Payroll Info</h2>
              <ul class="nav navbar-right panel_toolbox">
               
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                  <table class="table">
                   
                      <tbody>
                          <tr>
                              <th scope="row">Picture</th>
                              <td><img src="{{!empty($draftPayslip->employee->profile_photo)?asset('images/'.$draftPayslip->employee->profile_photo):""}}" class="media-object" style="width:150px"></td>
                              
                            </tr>
                        <tr>
                          <th scope="row">Employee Name</th>
                          <td>{{$draftPayslip->employee->first_name}}{{" "}}{{$draftPayslip->employee->middle_name}}{{" "}}{{$draftPayslip->employee->last_name}}</td>
                          
                        </tr>
                        <tr>
                          <th scope="row">Gender</th>
                          <td> @if ($draftPayslip->employee->gender==1)
                              <strong> Male</strong>
                          @else
                          <strong> Female</strong>
                          @endif</td>
                          
                        </tr>
  
                      
                      <tr>
                        <th scope="row">Basic Salary</th>
                        <td>{{number_format($draftPayslip->employee->basic_salary)}} TZS</td>
                        
                      </tr>
  
                      
                
                
                
                    </tbody>
                  </table>
  
              </form>
            </div>
          </div>
        </div>
      </div>


`

<form action="{{route('draft_payslips.update',$draftPayslip->id)}}" method="post">
<input type="hidden" name="_method" value="PATCH">
{{csrf_field()}}

<div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Income</h2>
              <ul class="nav navbar-right panel_toolbox">
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>
              <div id="income_fields">    
        </div>
        <input type="hidden" name="employee_id" value="{{$draftPayslip->employee->id}}">
        <input type="hidden" name="date" value="{{$date}}">
        @if(count($draftPayslip->incomes)!=0)  
        @foreach($draftPayslip->incomes as $income)
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="income_name[]" value="{{$income->name}}" placeholder="Income Type">
  </div>
</div>
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <div class="input-group">
    <input type="text" class="form-control" id="Degree" name="income_amount[]" value="{{$income->amount}}" placeholder="Amount">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="income_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>

@endforeach
@else
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="income_name[]"  placeholder="Income Type">
  </div>
</div>
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <div class="input-group">
    <input type="text" class="form-control" id="Degree" name="income_amount[]"  placeholder="Amount">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="income_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>

@endif


            </div>
          </div>
        </div>

          <div class="col-md-6 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Deduction</h2>
              <ul class="nav navbar-right panel_toolbox">
               
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br>

                 <div class="col-sm-6"><strong>{{App\SocialSecurity::find($draftPayslip->employee->socialSecurity->social_security_id)->name}}</strong></div>
              <div class="col-sm-6">{{App\SocialSecurity::find($draftPayslip->employee->socialSecurity->social_security_id)->employee_share}} %</div>
              <br>
              <br>
              @foreach($draftPayslip->employee->loans as $loan)
              @if($loan->balance!=0)
                <div class="col-sm-6"><strong>{{$loan->name}}</strong></div>
              <div class="col-sm-6">{{$loan->rate}} %</div>
              <br>
              <br>
              @endif
              @endforeach

     
             
             
          
          
              
              <div id="deduction_fields">    
        </div>
        @if(count($draftPayslip->deductions)!=0)    
        @foreach($draftPayslip->deductions as $deduction)
        
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="deduction_name[]"  value="{{$deduction->name}}" placeholder="Deduction Type">
  </div>
</div>
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <div class="input-group">
    <input type="text" class="form-control" id="Degree" name="deduction_amount[]"  value="{{$deduction->amount}}" placeholder="Amount">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="deduction_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="deduction_name[]"  placeholder="Deduction Type">
  </div>
</div>
<div class="col-sm-6 nopadding">
  <div class="form-group">
    <div class="input-group">
    <input type="text" class="form-control" id="Degree" name="deduction_amount[]"   placeholder="Amount">
      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="deduction_fields()"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>


@endif

            </div>

             <div class="row">
        <div class="col-md-offset-2 col-md-7 col-sm-12 col-xs-12">
        <button type="submit" class="btn btn-block btn-success">Save</button>
        </div>
      </div>
          </div>
          
        </div>




      </div>

</form>
     



      @endsection