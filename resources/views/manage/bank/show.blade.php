
@extends('new.layout')
@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bank Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
              <span class="section">Bank Name</span>
              <p>{{$bank->bank_name}}</p>
              <span class="section">Email</span>
              <p>{{$bank->email}}</p>
              <span class="section">Address</span>
              <p>{{$bank->address}}</p>
              <span class="section">charges</span>
              <p>{{$bank->bank_charges}}</p>
              <span class="section">Letter To Bank</span>
              <p>{!!$bank->letter_to_bank!!}</p>

                  </div>
                </div>
              </div>
            </div>

            @endsection