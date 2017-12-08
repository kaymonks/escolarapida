@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label>Escola</label>
    <select class="form-control"  name="destinatario" style="width: 100%;" tabindex="-1" aria-hidden="true">
        @foreach($escolas as $escola)
            <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
        @endforeach
    </select>

</div>
<div class="form-group">
    <label>Título</label>
    <input class="form-control" placeholder="Titulo" name="titulo">
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Data</label>
            <div class="form-control-wrapper">
                <input type="text" class="form-control" name="date" id="date">
            </div>
        </div>
        <div class="col-md-6">
           
            <label for="">Hora</label>
            <input type="text" class="form-control" name="time" id="time">
        </div>
        
    </div>
</div>
<div class="form-group">
    <label>Descrição</label>
    <textarea class="form-control" name="descricao" rows="10"></textarea>
</div>