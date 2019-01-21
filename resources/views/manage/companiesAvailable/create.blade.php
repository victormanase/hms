

@extends('new.layout')
@section('content')
<div class="row">
@include('partials._messages')
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Company Informations <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
           
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <form class="form-horizontal form-label-left" method="POST" action="{{route('companies.store')}}" enctype="multipart/form-data" novalidate="">

            {{csrf_field()}}
            <span class="section">General Info</span>

            

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Company Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="name" placeholder="ABC COMPANY" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="founder">Founder <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="founder" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="founder" placeholder="foo bar" required="required" type="text">
              </div>
            </div>
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="founded">Founded <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="founded" name="founded" required="required" data-validate-minmax="1800,2017" class="form-control col-md-7 col-xs-12" type="number">
              </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="founded">Type <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="founded" name="industry_type" required="required"  data-parsley-length="[2, 255]" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="website" name="website"  placeholder="www.website.com" class="form-control col-md-7 col-xs-12" type="url">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hq">Headquaters 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="occupation" name="hq" data-parsley-length="[2, 255]" class="optional form-control col-md-7 col-xs-12" type="text">
              </div>
            </div>
           
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Mission 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="mission"  name="mission" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Vision 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="vision" required="required" name="vision" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Values
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="vision" required="required" name="value" class="form-control col-md-7 col-xs-12"></textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Logo 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="occupation" name="logo"  class="optional form-control col-md-7 col-xs-12" type="file">
              </div>
            </div>
            
          
            
            <span class="section">Contact Info</span>



           
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" type="email">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="phone" required="required" data-validate-length-range="2,20" class="form-control col-md-7 col-xs-12" type="tel">
                </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Fax 
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="telephone" name="fax"  data-validate-length-range="2,20" class="form-control col-md-7 col-xs-12" type="tel">
                  </div>
                </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postal address">Postal Address 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="postal_address" name="postal_address"  data-validate-length-range="2,255" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="physical address">Physical Address 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="physical_address"  data-validate-length-range="2,255" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address1">Address1 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="address1"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address2">Address2
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="address2"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
              <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address2">Address3
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="telephone" name="address3"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" type="text">
                  </div>
                </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Cancel</button>
                <button id="send" type="submit" class="btn btn-success">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



  @endsection






 