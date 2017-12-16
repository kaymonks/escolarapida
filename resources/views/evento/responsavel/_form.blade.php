@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <label>Título</label>
            <input class="form-control" placeholder="Titulo" name="titulo">
        </div>
        <div class="col-md-12 col-lg-6">
            <label>Pais</label>
            <select class="form-control select2 select2-hidden-accessible" multiple="" name="destinatario[]" data-placeholder="Selecione o(s) pai(s)" style="width: 100%;" tabindex="-1" aria-hidden="true">
                @foreach($responsaveis as $responsavel)
                    <option value="{{ $responsavel->id }}">{{ $responsavel->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
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
    <label>Descrição</label>
    <textarea class="form-control" name="descricao" rows="10"></textarea>
</div>