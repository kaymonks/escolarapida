<div class="modal modal-danger fade in" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Excluir registro</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir este registro?</p>
            </div>
            <div class="modal-footer">
                @if(isset($registro) and isset($file))
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Fechar</button>
                    <a href="{{ route($file.'.deletar', $registro->id) }}" class="btn btn-outline">Excluir</a>
                @endif
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
