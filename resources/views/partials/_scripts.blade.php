


<!-- REQUIRED JS SCRIPTS -->


<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('js/custome_scripts.js')}}"></script>
<script src="{{asset('js/vue.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('plugins/iCheck/icheck.min.js')}}"></script>
<!-- vue js -->


<script src="{{asset('js/parsley.js')}}"></script>
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script src={{asset('bower_components/moment/moment.js')}}></script>
<script src={{asset('bower_components/fullcalendar/dist/fullcalendar.min.js')}}></script>
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>




<script>

  $("#btn1").click(function () {
    $("#email").val("superadministrator@app.com");
    $("#password").val("password");
   
});

$("#btn2").click(function () {
  $("#email").val("administrator@app.com");
  $("#password").val("password");
 
});

$("#btn3").click(function () {
  $("#email").val("hr@app.com");
  $("#password").val("password");
 
});


$("#btn4").click(function () {
  $("#email").val("departmentsupervisor@app.com");
  $("#password").val("password");
 
});


$("#btn5").click(function () {
  $("#email").val("employee@app.com");
  $("#password").val("password");
 
});

</script>

<script>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })


 

  
    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
});
</script>


<script>

  $('select[name="department_id"]').on('change', function(){
    var departmentId = $(this).val();
    if(departmentId) {
        $.ajax({
            url: '/manage/designations/get/'+departmentId,
            type:"GET",
            dataType:"json",
            beforeSend: function(){
                $('#loader1').css("visibility", "visible");
            },

            success:function(data) {

                $('select[name="designation_id"]').empty();

                $.each(data, function(key, value){

                    $('select[name="designation_id"]').append('<option value="'+ key +'">' + value + '</option>');

                });
            },
            complete: function(){
                $('#loader1').css("visibility", "hidden");
            }
        });
    } else {
        $('select[name="designation_id"]').empty();
    }

});

});



</script>