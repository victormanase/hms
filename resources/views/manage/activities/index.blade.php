@extends('new.layout')
@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>All System Logs </h2>
            <ul class="nav navbar-right panel_toolbox">
              
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">


            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th>
                      <div class="icheckbox_flat-green" style="position: relative;"><input id="check-all" class="flat" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                    </th>
                    <th class="column-title">ID </th>
                    <th class="column-title">Description </th>
                    <th class="column-title">Performed By </th>
                    <th class="column-title">Performed On </th>
                    <th class="column-title">Date</th>
               
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                @foreach ($logs as $log)

                <tr class="even pointer">
                    <td class="a-center ">
                      <div class="icheckbox_flat-green" style="position: relative;"><input class="flat" name="table_records" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                    </td>
                    <td class=" ">{{$log->id}}</td>
                    <td class=" ">{{$log->description}}</td>
                    <td class=" ">{{App\User::findOrFail($log->causer_id)->email}}</td>
                    <td class=" ">{{class_basename($log->subject_type)}}</td>
                    <td class=" ">{{$log->created_at->diffForHumans()}}</td>
               
                    <td class=" last"><a href="#">Delete</a>
                    </td>
                  </tr>
                    
                @endforeach
               
                 
                </tbody>
              </table>
              {{$logs->links()}}
            </div>
                    
                
          </div>
        </div>
      </div>


@endsection