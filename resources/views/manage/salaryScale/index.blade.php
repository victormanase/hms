

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Salary scales</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-default">Add Salary Scale</a>


          <div class="x_content">

            <!-- modals -->
            <!-- Large modal -->
           

          

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-md">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">New Scale</h4>
                  </div>
                 
                  <form id="demo-form2" data-parsley-validate="" method="post" action="{{route('salary-scales.store')}}" class="form-horizontal form-label-left" novalidate="">
                      {{csrf_field()}}
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="first-name" required="required"  name="name" class="form-control col-md-7 col-xs-12" type="text">
                      </div>
										</div>
										
										<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input id="first-name" required="required"  name="amount" class="form-control col-md-7 col-xs-12" type="number">
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
              <th style="width: 20%">Scale Name</th>
            
              <th>Amount</th>
             
              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($salaryScales as $salaryScale)
                
           
            <tr>
              <td>#</td>
              <td>
                <a>{{$salaryScale->name}}</a>
                <br>
                <small>Registered {{$salaryScale->created_at}}</small>
              </td>
             
              <td>
            {{$salaryScale->amount}}
              </td>
             
              <td>
               
                <a href="{{route('salary-scales.edit',$salaryScale->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>
              
            </tr>
            @endforeach
            
            
          </tbody>
        </table>
        <!-- end project list -->
        {{$salaryScales->links()}}

      </div>
    </div>
  </div>
</div>


  @endsection