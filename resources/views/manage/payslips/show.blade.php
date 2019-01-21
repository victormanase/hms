

            @extends('new.layout')

@section('title','| All Permissions')
@section('page_header',"All Permissions")



@section('discription', " ")

@section('content')

@include('partials._messages')

   <div class="row" style="color:black; font-size: 15px">
            <div class="col-md-4 col-md-offset-3 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pay Slip</h2>


<ul class="nav navbar-right panel_toolbox">
                     
                
                      <li><a href="{{route('payslipPdf',$payslip->id)}}" class="btn btn-default" ><i class="fa fa-file-pdf-o"></i> PDF</a>
                      </li>
                    </ul>

 

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="col-md-6">
                    <strong>Company Name</strong>
                  </div>
                  <div class="col-md-6">{{$payslip->company->name }}</div>
                  <div class="col-md-6">
                    <strong>Pay Slip for</strong>
                  </div>
                  <div class="col-md-6">{{$payslip->date->format('F Y')}}</div>
                  <div class="col-md-6">
                    <strong>Name</strong>
                  </div>
                  <div class="col-md-6">{{$payslip->employee->first_name }}{{" "}}{{$payslip->employee->last_name}}</div>
                  <div class="col-md-6">
                    <strong>Employee ID</strong>
                  </div>
                  <div class="col-md-6">{{$payslip->employee->id }}</div>


                  <div class="col-md-6">
                    <strong>Department</strong>
                  </div>
                  <div class="col-md-6">{{$payslip->employee->department->department_name }}</div>
                  <div class="col-md-6">
                    <strong>Designation</strong>
                  </div>
                  <div class="col-md-6">{{$payslip->employee->designation->designation_name }}</div>
                  <div class="col-md-6">
                    <strong>Salary Scale</strong>
                  </div>
                  <div class="col-md-6">RRR</div>
                  <div class="col-md-6">
                    <strong>Social Security Name</strong>
                  </div>
                  <div class="col-md-6">{{App\SocialSecurity::findOrFail($payslip->employee->socialSecurity->social_security_id)->name}}</div>
                  <div class="col-md-6">
                    <strong>Social Security Number</strong>
                  </div>
                  <div class="col-md-6">4354345</div>

                  <span class="section">Income</span>

                  <div class="col-md-6">Basic Salary</div>
                  <div class="col-md-6">{{number_format($payslip->employee->basic_salary) }}</div>
                  @foreach($payslip->incomes as $income)
                  @if($income->amount!=0)
                  <div class="col-md-6">{{$income->name}}</div>
                  <div class="col-md-6">{{number_format($income->amount) }}</div>
                  @endif
                  @endforeach

                  <div class="col-md-6">Gross Income</div>
                  <div class="col-md-6">{{number_format($payslip->gross_salary) }}</div>

                  <span class="section">Deduction</span>

                  <div class="col-md-6">{{App\SocialSecurity::findOrFail($payslip->employee->socialSecurity->social_security_id)->name}}</div>
                  <div class="col-md-6">{{number_format($payslip->ssf->amount) }}</div>
                  <div class="col-md-6">P.A.Y.E</div>
                  <div class="col-md-6">{{number_format($payslip->payee) }}</div>
                  @foreach($payslip->loans as $loan)
                  <div class="col-md-6">{{App\Loan::findOrFail($loan->loan_id)->name}}</div>
                  <div class="col-md-6">{{number_format($loan->loan_deduction) }}</div>
                  @endforeach
                  @foreach($payslip->deductions as $deduction)
                  @if($deduction->amount!=0)
                  <div class="col-md-6">{{$deduction->name}}</div>
                  <div class="col-md-6">{{number_format($deduction->amount) }}</div>
                  @endif
                  @endforeach
                  

                  <span class="section">Net Pay</span>

                  <div class="col-md-6">
                    <strong>Net Pay</strong>
                  </div>
                  <div class="col-md-6">{{number_format($payslip->net_pay)}}</div>
                  <div class="col-md-6">Deposited To</div>
                  <div class="col-md-6">{{$payslip->employee->bank->bank_name}}</div>

                  <span class="section">Loan Summary</span>

                  <div class="col-md-6">Balance</div>
                  <div class="col-md-6">{{number_format($total_balance)}}</div>
                  <div class="col-md-6">Paid</div>
                  <div class="col-md-6">{{number_format($total_paid)}}</div>





                </div>
                
              </div>
              
            </div>
            
          </div>

          @endsection