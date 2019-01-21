

@extends('new.layout')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Company Informations <small></small></h2>
          <ul class="nav navbar-right panel_toolbox">
           
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <form class="form-horizontal form-label-left" method="POST" action="{{route('companies.update',$company->id)}}" enctype="multipart/form-data" novalidate="">

            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <span class="section">General Info</span>

            

            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Company Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20""  value="{{$company->name or old('name')}}" name="name" placeholder="ABC COMPANY" required="required" type="text">
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="founder">Founder <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="founder" class="form-control col-md-7 col-xs-12" data-validate-length-range="5,20" value="{{$company->founder or old('founder')}}" name="founder" placeholder="foo bar" required="required" type="text">
              </div>
            </div>
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="founded">Founded <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="founded" name="founded" required="required" value="{{$company->founded or old('founded')}}" data-validate-minmax="1800,2017" class="form-control col-md-7 col-xs-12" type="number">
              </div>
            </div>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="founded">Type <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="founded" name="industry_type" required="required" value="{{$company->industry_type or old('industry_type')}}" data-parsley-length="[2, 255]" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
           

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="website" name="website"  placeholder="www.website.com" class="form-control col-md-7 col-xs-12" value="{{$company->website or old('website')}}" type="url">
              </div>
            </div>
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hq">Headquaters <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="hq" value="{{$company->hq or old('hq') }}" name="hq" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12" type="text">
              </div>
            </div>
           
            
            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="textarea" required="required" name="description" class="form-control col-md-7 col-xs-12">{{$company->description or old('description')}}</textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Mission 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="mission"  name="mission" class="form-control col-md-7 col-xs-12">{{$company->mission or old('mission')}}</textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Vision 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="vision" required="required" name="vision" class="form-control col-md-7 col-xs-12">{{$company->vision or old('vision')}}</textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Values
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea id="vision" required="required" name="value" class="form-control col-md-7 col-xs-12"> {{$company->value or old('value')}}</textarea>
              </div>
            </div>

            <div class="item form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Logo 
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="occupation" name="logo"class="optional form-control col-md-7 col-xs-12" type="file">
              </div>
            </div>
            
          
            
            <span class="section">Contact Info</span>



           
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{$company->email or old('email')}}" type="email">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="phone" required="required" data-validate-length-range="8,20" value="{{$company->phone or old('phone')}}" class="form-control col-md-7 col-xs-12" type="tel">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postal address">Postal Address 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="postal_address" name="postal_address"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="{{$company->postal_address or old('postal_address')}}" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="physical address">Physical Address 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="physical_address"  data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" value="{{$company->physical_address or old('physical_address')}}" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address1">Address1 
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="address1" value="{{$company->address1 or old('address1')}}" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>
              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address2">Address2
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="address2"  data-validate-length-range="8,20" value="{{$company->address2 or old('address2')}}" class="form-control col-md-7 col-xs-12" type="text">
                </div>
              </div>

              <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address2">Address3
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="telephone" name="address3"  data-validate-length-range="8,20" value="{{$company->address3 or old('address3')}}" class="form-control col-md-7 col-xs-12" type="text">
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