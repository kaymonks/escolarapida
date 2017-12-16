@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (@isset ($escolas))
    <div class="form-group">
	    <label>Escola</label>
	    <select class="form-control"  name="destinatario" style="width: 100%;" tabindex="-1" aria-hidden="true">
	        @foreach($escolas as $escola)
	            <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
	        @endforeach
	    </select>
		@endisset
		{{-- expr --}}
    </div>
@endif

<div class="form-group">
    <label for="">Evento agendado para:</label>
    @if(!empty($nomeTurmas))
        <br>Turma(s):
        @foreach($nomeTurmas as $nt)
            {{ end($nomeTurmas) == $nt ? $nt : $nt.", "}}
        @endforeach
    @endif
    @if(!empty($nomePais))
        <br>Pai(s):
        @foreach($nomePais as $np)
            {{ end($nomePais) == $np ? $np : $np.", "}}
        @endforeach
    @endif
    @if(!empty($nomeEscola))
        <br>
        @foreach($nomeEscola as $ne)
            {{ end($nomeEscola) == $ne ? $ne : $ne.", "}}
        @endforeach
    @endif
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-8">
            <label>Título</label>
            <input class="form-control" placeholder="Titulo" name="titulo" value="{{ isset($eventos->titulo) ? $eventos->titulo : '' }}">
        </div>
        <div class="col-sm-6 col-md-2">
            <label for="date">Data</label>
            <div class="form-control-wrapper">
                <input type="text" class="form-control" name="date" id="date" value="{{ isset($eventos->date) ? $eventos->date : '' }}">
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <label for="time">Hora</label>
            <input type="text" class="form-control" name="time" id="time" value="{{ isset($eventos->time) ? $eventos->time : '' }}">
        </div>
    </div>
</div>
<div class="form-group">
    <label>Descrição</label>
    <textarea class="form-control" name="descricao" rows="10">{{ isset($eventos->descricao) ? $eventos->descricao : '' }}</textarea>
</div>