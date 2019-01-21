

@extends('new.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Letter to Bank</h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{route('bankLetter.create')}}" type="button" class="btn btn-default"> Create New Bank Letter</a>
            </ul>
          
         
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

     

        <!-- start project list -->
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">#</th>
              <th style="width: 20%">Bank Name</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            
            @foreach($bank_letters as $bank_letter)
            <tr>
            <td></td>
            <td>{{$bank_letter->bank->bank_name}}</td>
            <td>{{$bank_letter->created_at}}</td>
            <td>
                <a href="{{route('bankLetter.show',$bank_letter->id)}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="fa fa-eye"></i></a>
                <a href="{{route('bankLetter.edit',$bank_letter->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i>  </a>
                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i> </a>
              </td>

            </tr>
            @endforeach
            </tbody>
            
             
</table>


      </div>
    </div>
  </div>
</div>


  @endsection