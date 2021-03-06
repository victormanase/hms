 @extends('new.layout') @section('content')
 @include('partials._messages')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Tax Table</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-default">Add Income Range</a>


          <div class="x_content">

            <!-- modals -->
            <!-- Large modal -->




            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-md">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2">New Range</h4>
                  </div>

         

                  <form id="demo-form2" data-parsley-validate="" method="post" action="{{route('tax-table.store')}}" class="form-horizontal form-label-left"
                    novalidate="">
                    {{csrf_field()}}

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="income-range">Monthly Income
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-4">
                        <input id="from" name="minIncome" placeholder="Minimum Income" required="required" class="form-control col-md-2 col-xs-12" type="number">
                      </div>
                      <div class="col-md-1">
                        <h3>To</h3>
                      </div>
                      <div class="col-md-4">
                        <input id="to" name="maxIncome" required="required" placeholder="Maximum Income" class="form-control col-md-2 col-xs-12" type="number">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="total-rate" class="control-label col-md-3 col-sm-3 col-xs-12">Rate
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="total-rate" class="form-control col-md-7 col-xs-12" placeholder="in %" required="required" name="rate" type="number">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Range Charge
                        <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="amount" class="form-control col-md-7 col-xs-12" name="rangeCharge" required="required" type="number">
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
              <th style="width: 20%">Monthly Income</th>

              <th>Tax Rate</th>

              <th style="width: 20%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($taxTables as $taxTable)
            <tr>
              @if ($taxTable->rate===0)

              <td>#</td>
              <td>
                <a>Total Income Does not exceed {{$taxTable->maxIncome}} </a>
                <br> {{--
                <small>Updated {{$taxTable->updated_at}}</small> --}}
              </td>

              <td>
                NIL
              </td>

              @else
              <td>#</td>
              <td>
                <a>From {{number_format($taxTable->minIncome)}} Tshs to {{number_format($taxTable->maxIncome)}} Tshs </a>
                <br> {{--
                <small>Updated {{$taxTable->updated_at}}</small> --}}
              </td>

              <td>
                {{number_format($taxTable->rangeCharge)}} Tshs + {{$taxTable->rate}}% of the amount in excess of Tshs {{number_format($taxTable->minIncome)}}
              </td>

              @endif




              <td>

                <a href="{{route('tax-table.edit',$taxTable->id)}}" class="btn btn-info btn-xs">
                  <i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-xs">
                  <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i>
                </a>
              </td>

            </tr>
            @endforeach


          </tbody>
        </table>
        <!-- end project list -->


      </div>
    </div>
  </div>
</div>


@endsection