@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger col-md-6">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <p>Para: {{ $escolas->nome }}</p>

            <input type="hidden" name="destinatario[]" value="{{ $escolas->id }}">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" placeholder="Titulo" name="titulo" value="{{ old('titulo')}}">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <div class="form-group">
            <p>Mensagem</p>
            <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 200px; /*display: none;*/">{{ old('corpo') }}</textarea>
        </div>
    </div>
</div>