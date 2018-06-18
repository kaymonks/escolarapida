@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
    <div class="form-group">
        <label class="col-sm-4 control-label">Título</label>
        <div class="col-sm-8 col-md-5">
            <input class="form-control" placeholder="Titulo" name="titulo">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Turmas</label>
        <div class="col-md-8 col-md-5">
            <select class="form-control select2 select2-hidden-accessible" multiple="" name="destinatario[]" data-placeholder="Selecione a(s) turma(s)" style="width: 100%;" tabindex="-1" aria-hidden="true">
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->ano}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Data</label>
        <div class="col-sm-8 col-md-5">
            <input type="text" class="form-control" name="date" id="date">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-4 control-label">Hora</label>
        <div class="col-sm-4 col-md-5">
            <input type="text" class="form-control" name="time" id="time">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-4 control-label">Descrição</label>
        <div class="col-sm-4 col-md-5">
            <textarea class="form-control" name="descricao" rows="10"></textarea>
        </div>
    </div>

</div>