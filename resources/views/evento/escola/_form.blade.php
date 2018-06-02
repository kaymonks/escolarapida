@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
    <div class="form-group">
        <label class="col-sm-4 control-label">Evento para: </label>
        <div class="col-sm-8 col-md-5">
            <label for="">Escola</label>
            <input type="hidden" name="destinatario[]" value="{{ $escolas->id }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Título</label>
        <div class="col-sm-8 col-md-5">
            <input class="form-control" placeholder="Titulo" name="titulo">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Data</label>
        <div class="col-sm-8 col-md-5">
            <div class="form-control-wrapper">
                <input type="text" class="form-control" name="date" id="date">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Hora</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" class="form-control" name="time" id="time">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Descrição</label>
        <div class="col-sm-8 col-md-5">
            <textarea class="form-control" name="descricao" rows="10"></textarea>
        </div>
    </div>
</div>