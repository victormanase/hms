
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    td {
        padding: 3px;
    }
    
</style>

</head>
<body>
  
<h2 align="center">Pay Slip</h2>

<table align="center">

    <tr>
        <td>
            <strong>{{$payslip->company->name }}</strong>
        </td>



    </tr>
    <tr>
        <td>Pay Slip for
            <strong> {{$payslip->date->format('F Y')}}</strong>
        </td>
    </tr>
    <tr>
        <td>
            <strong>{{$payslip->employee->first_name }}{{" "}}{{$payslip->employee->last_name}}</strong>
        </td>
    </tr>
    <tr>
        <td>Employee ID
            <strong>{{$payslip->employee->id }}</strong>
        </td>

    </tr>
    <tr>
        <td>Department:
            <strong>{{$payslip->employee->department->department_name }}</strong>
        </td>

    </tr>
    <tr>
        <td>Designation:
            <strong>{{$payslip->employee->designation->designation_name }}</strong>
        </td>

    </tr>
    <tr>
        <td>Salary Scale:
            <strong>sdfsa</strong>
        </td>

    </tr>
    <tr>
        <td>Social Security:
            <strong>{{App\SocialSecurity::findOrFail($payslip->employee->socialSecurity->social_security_id)->name}}</strong>
        </td>

    </tr>
    <tr>
        <td>Social Security Number:
            <strong>5654ggdg</strong>
        </td>

    </tr>

    <tr>
        <td colspan="2" style=" border-top: 1px solid black; border-bottom: 1px solid black;">INCOMES</td>
    </tr>

    <tr>
        <td>Basic Salary

        </td>

        <td>{{number_format($payslip->employee->basic_salary) }}

        </td>

    </tr>
    @foreach($payslip->incomes as $income)
                  @if($income->amount!=0)
                  <tr>
        <td>{{$income->name}}</td>
                  <td>{{number_format($income->amount) }}</td>
                  @endif
                  @endforeach
  
        


    </tr>
    <tr>
        <td>Gross Income

        </td>
        <td>{{number_format($payslip->gross_salary) }}

        </td>
    </tr>
    <tr>
        <td colspan="2" style=" border-top: 1px solid black; border-bottom: 1px solid black;">DEDUCTIONS

        </td>

    </tr>
    <tr>
        <td>{{App\SocialSecurity::findOrFail($payslip->employee->socialSecurity->social_security_id)->name}}
        </td>

        <td>{{number_format($payslip->ssf->amount) }}

        </td>

    </tr>
    <tr>
        <td>P.A.Y.E

        </td>

        <td>{{number_format($payslip->payee) }}

        </td>

    </tr>
    @foreach($payslip->loans as $loan)<tr>
                  <td>{{App\Loan::findOrFail($loan->loan_id)->name}}</td>
                  <td>{{number_format($loan->loan_deduction) }}</td>
  </tr>
                  @endforeach

                  @foreach($payslip->deductions as $deduction)
                  @if($deduction->amount!=0)
                  <tr>
                  <td>{{$deduction->name}}</td>
                  <td>{{number_format($deduction->amount) }}</td>
                  @endif
  </tr>
                  @endforeach
    <tr>
        <td colspan="2" style=" border-top: 1px solid black; border-bottom: 1px solid black;">NET PAY

        </td>

    </tr>
    <tr>
        <td>Net Pay

        </td>

        <td>{{number_format($payslip->net_pay)}}

        </td>

    </tr>
    <tr>
        <td>Deposited to
           
        </td>

        <td>
        <strong>{{$payslip->employee->bank->bank_name}}</strong>

        </td>

    </tr>
</table>
</body>
</html>

