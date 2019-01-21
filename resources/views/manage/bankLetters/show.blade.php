
@extends('new.layout')
@section('content')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Letter To Bank</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    <li><a href="{{route('bankLetterPdf',$letter->id)}}" class="btn btn-default" ><i class="fa fa-file-pdf-o"></i> PDF</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
             
         
              <p>{!!$letter->letter!!}</p>

                  </div>
                </div>
              </div>
            </div>

            @endsection