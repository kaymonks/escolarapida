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

<div class="mailbox-read-message">
    {!! isset($mensagem->corpo) ? nl2br(e($mensagem->corpo)) : ''  !!}
</div>