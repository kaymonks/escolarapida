<div class="form-group">
    <label>Pais</label>
    <select class="form-control select2 select2-hidden-accessible" multiple="" name="destinatario[]" data-placeholder="Selecione o(s) pai(s)" style="width: 100%;" tabindex="-1" aria-hidden="true">
        @foreach($pais as $pai)
            <option value="{{ $pai->id }}">{{ $pai->nome }}</option>
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