</div>
</div>

<!-- jQuery -->
<script src="{{asset('gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('gentelella/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('gentelella/vendors/nprogress/nprogress.js')}}"></script>

<script src="{{asset('gentelella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/skycons/skycons.js')}}"></script>

<!-- Flot -->
<script src="{{asset('gentelella/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('gentelella/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('gentelella/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('gentelella/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('gentelella/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('gentelella/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('gentelella/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('gentelella/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- validator -->
<script src="{{asset('gentelella/vendors/validator/validator.js')}}"></script>
<!-- <script src="{{asset('gentelella/vendors/moment/min/moment.min.js')}}"></script> -->
<script src="{{asset('gentelella/vendors/fullcalendar/dist/fullcalendar.min.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('gentelella/build/js/custom.min.js')}}"></script>
<script src="{{asset('gentelella/vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>






<script>
    $(document).ready(function () {

        $('select[name="department_id"]').on('change', function () {
            var departmentId = $(this).val();
            if (departmentId) {
                $.ajax({
                    url: '/manage/designations/get/' + departmentId,
                    type: "GET",
                    dataType: "json",
                    beforeSend: function () {
                        $('#loader1').css("visibility", "visible");
                    },

                    success: function (data) {

                        $('select[name="designation_id"]').empty();

                        $.each(data, function (key, value) {

                            $('select[name="designation_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');

                        });
                    },
                    complete: function () {
                        $('#loader1').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="designation_id"]').empty();
            }

        });



        $('select[name="department_id2"]').on('change', function () {
            var departmentId2 = $(this).val();
            if (departmentId2) {
                $.ajax({
                    url: '/manage/employees/get/' + departmentId2,
                    type: "GET",
                    dataType: "json",
                    beforeSend: function () {
                        $('#loader1').css("visibility", "visible");
                    },

                    success: function (data) {

                        $('select[name="employee_id"]').empty();

                        $.each(data, function (key, value) {

                            $('select[name="employee_id"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');

                        });
                    },
                    complete: function () {
                        $('#loader1').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="employee_id"]').empty();
            }

        });



        $('#markasread').click(function () {
            $.ajax({
                url: '{{route('markLeaveNotificationAsRead')}}'
            });

        });




    });

    var room = 1;

    function income_fields() {

        room++;
        var objTo = document.getElementById('income_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="col-sm-6 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Degree" name="income_name[]" value="" placeholder="Income Type"></div></div><div class="col-sm-6 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="Degree" name="income_amount[]" value="" placeholder="Amount"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_income_fields(' +
            room +
            ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest);
    }

    function remove_income_fields(rid) {
        $('.removeclass' + rid).remove();
    }




    var room = 1;

    function deduction_fields() {

        room++;
        var objTo = document.getElementById('deduction_fields');
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML =
            '<div class="col-sm-6 nopadding"><div class="form-group"> <input type="text" class="form-control" id="Degree" name="deduction_name[]" value="" placeholder="Dedution Type"></div></div><div class="col-sm-6 nopadding"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="Degree" name="deduction_amount[]" value="" placeholder="Amount"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_deduction_fields(' +
            room +
            ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';

        objTo.appendChild(divtest);
    }

    function remove_deduction_fields(rid) {
        $('.removeclass' + rid).remove();
    }
</script>

@stack('scripts')