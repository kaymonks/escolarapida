@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label>Evento para: </label><br>Escola
    <input type="hidden" name="destinatario[]" value="{{ $escolas->id }}">


</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-8">
            <label>Título</label>
            <input class="form-control" placeholder="Titulo" name="titulo">
        </div>
        <div class="col-xs-6 col-md-2">
            <label>Data</label>
            <div class="form-control-wrapper">
                <input type="text" class="form-control" name="date" id="date">
            </div>
        </div>
        <div class="col-xs-6 col-md-2">
            <label for="">Hora</label>
            <input type="text" class="form-control" name="time" id="time">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">

        
    </div>
</div>
<div class="form-group">
    <label>Descrição</label>
    <textarea class="form-control" name="descricao" rows="10"></textarea>
</div>