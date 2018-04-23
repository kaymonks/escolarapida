@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger col-md-6">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
    <div class="form-group">
        <label class="col-sm-4 control-label">Para: </label>
        <div class="col-sm-8 col-md-5">
            <p class="form-control-static">{{ $escolas->nome }}</p>
            <input type="hidden" name="destinatario[]" value="{{ $escolas->id }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Assunto</label>
        <div class="col-sm-8 col-md-5">
            <input class="form-control" placeholder="Titulo" name="titulo" value="{{ old('titulo')}}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Mensagem</label>
        <div class="col-sm-8 col-md-5">
            <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 200px; /*display: none;*/" placeholder="Adicione uma mensagem aqui">{{ old('corpo') }}</textarea>
        </div>
    </div>

</div>

