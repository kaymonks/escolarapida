@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Assunto</label>
            <input class="form-control" placeholder="Assunto" name="titulo" value="{{ old('titulo') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Responsáveis</label>
            <select class="form-control select2 select2-hidden-accessible" multiple="" name="destinatario[]" data-placeholder="Selecione o(s) responsavel(is)" style="width: 100%;" tabindex="-1" aria-hidden="true">
                @foreach($responsaveis as $responsavel)
                    <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

</div>
<div class="form-group">
    <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 300px; /*display: none;*/" placeholder="Adicione uma mensagem aqui">{{ old('corpo') }}</textarea>
</div>