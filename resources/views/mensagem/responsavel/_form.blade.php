@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="col-md-12">
    <div class="form-group">
        <label class="col-sm-4 control-label">Assunto</label>
        <div class="col-sm-8 col-md-5">
            <input class="form-control" placeholder="Assunto" name="titulo" value="{{ old('titulo') }}">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Responsável</label>
        <div class="col-sm-8 col-md-5">
            <select class="form-control select2 select2-hidden-accessible" multiple="" name="destinatario[]"  data-placeholder="Selecione um ou mais responsáveis" style="width: 100%;" tabindex="-1" aria-hidden="true">
                @foreach($responsaveis as $responsavel)
                    <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Mensagem</label>
        <div class="col-sm-8 col-md-5">
            <textarea id="compose-textarea" name="corpo" class="form-control" style="height: 300px; /*display: none;*/" placeholder="Adicione uma mensagem aqui">{{ old('corpo') }}</textarea>
        </div>
    </div>
</div>