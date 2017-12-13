@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
	@if (@isset ($escolas))
	
	    <label>Escola</label>
	    <select class="form-control"  name="destinatario" style="width: 100%;" tabindex="-1" aria-hidden="true">
	        @foreach($escolas as $escola)
	            <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
	        @endforeach
	    </select>
		@endisset
		{{-- expr --}}
	@endif

</div>

<div class="form-group">
    <h2 class="h5">De:
        @if(isset($remetente))

            @foreach($remetente as $rt)
                {{ $rt }}
            @endforeach
        @endif
    </h2>
    <h2 class="box-title h5">Para:
        @if(!empty($nomeTurmas))
            <br>Turma(s):
            @foreach($nomeTurmas as $nt)
                {{ $nt }} @if($nt != end($nomeTurmas)), @endif
            @endforeach
        @endif
        @if(!empty($nomePais))
            <br>Pai(s):
            @foreach($nomePais as $np)
                {{ $np }} @if($np != end($nomePais)), @endif
                @endforeach
        @endif
        @if(!empty($escola))
            <br>Escola:
            @foreach($escola as $ne)
                {{ $ne['nome'] }}
            @endforeach
        @endif
        @if(!empty($professor))
            <br>Professor:
            @foreach($professor as $npr)
                {{ $npr['nome'] }}
            @endforeach
        @endif
    </h2>
</div>
<hr>

<div class="form-group">
    <p>{{ isset($mensagem->corpo) ? $mensagem->corpo : '' }}</p>
</div>