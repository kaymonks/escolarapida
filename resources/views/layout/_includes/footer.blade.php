</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>

<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>
<script src="{{asset("/bower_components/AdminLTE/plugins/select2/select2.full.min.js")}}"></script>
<script src="{{asset("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js")}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{asset("/bower_components/AdminLTE/plugins/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js")}}"></script>
<!-- iCheck -->
{{--<script src="{{ asset("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js") }}"></script>--}}
{{--<script>--}}
    {{--$(function () {--}}
        {{--$('input').iCheck({--}}
            {{--checkboxClass: 'icheckbox_square-blue',--}}
            {{--radioClass: 'iradio_square-blue',--}}
            {{--increaseArea: '20%' // optional--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script>
    $('.select2').select2();

    $('#date').bootstrapMaterialDatePicker
    ({
        format: "DD/MM/YYYY",
        time: false,
        clearButton: true,
        lang: 'pt-BR'
    });


    $('#time').bootstrapMaterialDatePicker
    ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

</script>
</body>
</html>
