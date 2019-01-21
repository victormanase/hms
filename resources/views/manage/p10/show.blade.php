
@extends('new.layout')
@section('content')

<div class="row">
                <div class="col-md-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>P10 </h2>
                      <div class="clearfix"></div>
                    </div>
            <div class="x_content">
                <br>
                
                  <p align="center">TANZANIA REVENUE AUTHORITY</p>
                  <p align="center">INCOME TAX DEPARTMENT</p>
                  <p align="center">P.A.Y.E EMPLOYERS END OF YEAR CERTIFICATE</p>
                  <p align="center">YEAR </p>
                  <p>To Regional / District Revenue Officer <br>Income Tax Department <br> P.O.Box 303</p>
                  <p>Name of organization / institution <b>abc cop </b> <br> Nature of Business <b> inverstment</b> <br>
                  State whether parastatal / other company, Corporation or partnership</p>
                  <p>I /We forward herewith 10</p>
                  <p>tax (as listed) amount to shs. 29,324,407.80 Tax deduction cards (form p9) the total</p>
                  <p>&nbsp;</p>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2></h2>
                          
                            
                           
                          
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                  
                       
                  
                          <!-- start project list -->
                          <table class="table projects">
                            <thead>
                              <tr>
                                <th>Mounth</th>
                                <th>Amount</th>
                                
                               
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($p10s as $p10)
                              <tr>
                                <td>{{$p10->created_at->format('F')}}</td>
                                <td>{{$p10->amount}}</td>
                              </tr>
                              @endforeach
                              <tr>
                            
                              </tfoot>
                          </table>
                          </div>
                          </div>
                          </div>
                  <p>&nbsp;</p>
                  <p>Annual wages paid per payroll including wages not subject to P.A.Y.E  Shs_________________________ <br>
                    I/We certify that the particulars entered by us / me on these forms are correct.</p>
                    <p align="center">___________________Signature of Employers / Paying</p>
                    <p align="center">LUTHERAN INVESTMENT Branch</p>
                    <p align="center">P.O.BOX 303 ARUSHA  Postal Address</p>
                    <p align="center">___________________Date</p>
                  
                  </div>

                
              </div>
              
              </div>
            </div>
          </div>

@endsection