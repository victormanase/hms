

@extends('new.layout')
@section('content')
<div class="row">
    @include('partials._messages')
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Social Securities</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-default">Add Social Security Fund</a>


          <div class="x_content">

            <!-- modals -->
            <!-- Large modal -->
           

          

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-md">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">New Social Security Fund</h4>
                  </div>
                 
                  <form id="demo-form2" data-parsley-validate="" method="post" action="{{route('social-securities.store')}}" class="form-horizontal form-label-left" novalidate="">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required"  name="name" class="form-control col-md-7 col-xs-12" type="text">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Deduct From</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="deduct_from">
                          <option>Choose option</option>
                          <option value="0">Basic Salary</option>
                          <option value="1">Gross Salary</option>
                         
                        </select>
                      </div>
                    </div>
										
										<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Employer Share <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input id="first-name" required="required"  name="employer_share" class="form-control col-md-7 col-xs-12" type="number">
												</div>
                      </div>
                      
                      <div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Employee Share <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input id="first-name" required="required"  name="employee_share" class="form-control col-md-7 col-xs-12" type="number">
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
            <!-- /modals -->
          </div>
          
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

       

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Name</th>
              <th>Deducted From</th>
              <th>Employer Share</th>
              <th>Employee Share</th>
             
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($socialSecurities as $socialSecurity)
                
           
            <tr>
              <td>#</td>
              <td>
                <a>{{$socialSecurity->name}}</a>
                
              </td>
             
              <td>
                @if ($socialSecurity->deduct_from==0)
                    Baic Salary
                @else
                   Gross Salary
                @endif
           
              </td>

              <td>
                {{$socialSecurity->employer_share}} %
                  </td>

                  <td>
                    {{$socialSecurity->employee_share}} %
                      </td>
             
              <td>
               
                <a href="{{route('social-securities.edit',$socialSecurity->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
        <!-- end project list -->

        {{$socialSecurities->links()}}
    

      </div>
    </div>
  </div>
</div>


  @endsection