@extends('new.layout') @section('content')
<div class="col-md-6 col-sm-6 col-xs-6">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Tax Table</h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" action="{{route('tax-table.update',$taxTable->id)}}"
                method="post" novalidate="">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="income-range">Monthly Income
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-4">
                        <input id="from" name="minIncome" required="required" value="{{$taxTable->minIncome}}" class="form-control col-md-2 col-xs-12"
                            type="number">
                    </div>
                    <div class="col-md-1">
                        <h3>To</h3>
                    </div>
                    <div class="col-md-4">
                        <input id="to" name="maxIncome" required="required" value="{{$taxTable->maxIncome}}" class="form-control col-md-2 col-xs-12"
                            type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="total-rate" class="control-label col-md-3 col-sm-3 col-xs-12">Rate
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="total-rate" class="form-control col-md-7 col-xs-12" value="{{$taxTable->rate}}" required="required" name="rate"
                            type="number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Range Charge
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="amount" class="form-control col-md-7 col-xs-12" value="{{$taxTable->rangeCharge}}" name="rangeCharge" required="required"
                            type="number">
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