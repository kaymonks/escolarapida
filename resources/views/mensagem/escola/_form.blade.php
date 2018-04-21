@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger col-md-6">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="clearfix"></div>

<div class="form-group">
    <p>Para: {{ $escolas->nome }}</p>
    <input type="hidden" name="destinatario[]" value="{{ $escolas->id }}">
</div>

<div class="form-group">
    <input class="form-control" placeholder="Titulo" name="titulo" value="{{ old('titulo')}}">
</div>

<div class="form-group">
    <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 200px; /*display: none;*/" placeholder="Adicione uma mensagem aqui">{{ old('corpo') }}</textarea>
</div>