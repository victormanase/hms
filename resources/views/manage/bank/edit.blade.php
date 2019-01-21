

@extends('new.layout')
@section('content')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

  

  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Bank Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
                     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <form id="demo-form2" data-parsley-validate="" method="post" action="{{route('banks.update',$bank->id)}}" class="form-horizontal form-label-left" novalidate="">
                  <input type="hidden" name="_method" value="PATCH">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required" value="{{$bank->bank_name}}" name="bank_name" class="form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required" value="{{$bank->email}}" name="email" class="form-control col-md-7 col-xs-12" type="email">
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required" value="{{$bank->address}}"  name="address" class="form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Charges <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required" value="{{$bank->bank_charges}}" name="bank_charges" class="form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Letter To Bank <span class="required">*</span>
                      </label>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                      <textarea rows="20" name="letter_to_bank">{{$bank->letter_to_bank}}</textarea>
                      </div>
                    </div>
                   
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
  
                  </div>
                </div>
              </div>

              @endsection
              