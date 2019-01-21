


          @extends('new.layout')

          @section('titie', '| Create New Permission')
          @include('partials._messages')
              
          @section('content')

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Create New Permission</h2>
                <ul class="nav navbar-right panel_toolbox">
                  
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate=""  method="post"   action="{{ route('permissions.update',$permission->id) }}" class="form-horizontal form-label-left" novalidate="">
                  {{method_field('PUT')}}
              
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="name" placeholder="should have alpha dash" value ="{{ $permission->name or old('name') }}" type="text">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Display Name <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="display_name" placeholder="Human friendly name" value ="{{ $permission->display_name or old('display_name') }}" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input id="last-name"  required="required" name="description" value="{{$permission->description or old('description')}}" class="form-control col-md-7 col-xs-12" type="text">
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

  
    
@endsection

  
    
