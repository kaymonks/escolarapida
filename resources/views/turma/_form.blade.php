<div class="form-group">
    <label for="inputAno">Ano</label>
    <input type="text" name="ano" placeholder="Ano" class="form-control" id="inputAno" value="{{isset($turmas->ano) ? $turmas->ano : ''}}">
</div>

<div class="form-group">
    <label for="">Selecione o(s) Professor(es)</label>
    <select multiple name="professor[]" class="form-control">
        @foreach($registros as $registro)
            <option value="{{ $registro->id }}"  @if(in_array($registro->id, $nomes)) selected @endif >{{ $registro->nome }}</option>
        @endforeach
    </select>
</div>