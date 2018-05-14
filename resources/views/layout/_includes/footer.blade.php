
@include('modules._modules')

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
<script src="{{ asset("/bower_components/AdminLTE/plugins/bootbox/bootbox.min.js") }}"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{asset("/bower_components/AdminLTE/plugins/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js")}}"></script>
<script src="{{asset("/bower_components/AdminLTE/plugins/jQuery-Mask-Plugin/jquery.mask.js")}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>



<script type="text/javascript">


    $('#datatables').DataTable({
        'language': {
            'url' : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json'
        }
    });
    $('#datatablesOrderByCad').DataTable({
        'language': {
            'url' : '//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json'
        },
        'order': [[ 0, 'desc' ]]
    });


    $('select[name=estado]').change(function () {
        var idEstado = $(this).val();
        console.log(idEstado);
        $.get('/get-cidades/' + idEstado, function (cidades) {
            $('select[name=cidade]').empty();
            $.each(cidades, function (key, value) {
                $('select[name=cidade]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
            });
        });
    });

    $("#accordion .box-primary").on('click', function () {
        $(this).children('.box-body').toggle("slow");
    });


    $("#nova_mensagem").css("display", "none");
    $("#exibirResposta").click(function(){
        if ($("#nova_mensagem").css('display') == 'none') {
            $("#nova_mensagem").show('slow');
        } else {
            $("#nova_mensagem").hide('slow');
        }
    });

    $('.select2').select2();

    $('#date').bootstrapMaterialDatePicker
    ({
        format: "DD/MM/YYYY",
        time: false,
        clearButton: true,
        lang: 'pt-BR',
    });

    $('#time').bootstrapMaterialDatePicker
    ({
        date: false,
        shortTime: false,
        format: 'HH:mm'
    });

    $(".excluirRegistro").on("click", function(){
        return confirm("Você tem certeza que deseja excluir este registro?");
    });

    $("#inputTelefone").mask('(99) 9999-9999');

</script>
</body>
</html>
