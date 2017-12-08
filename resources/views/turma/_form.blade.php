@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-lg-4 col-md-6">
    <div class="form-group">
        <label for="inputAno">Turma</label>
        <input type="text" name="ano" placeholder="Ano" class="form-control" id="inputAno" value="{{isset($turmas->ano) ? $turmas->ano : ''}}">
    </div>
</div>
<div class="col-lg-4 col-md-6">
    <div class="form-group">
        <label for="">Selecione o(s) Professor(es)</label>
        <select multiple name="professor[]" class="form-control">
            @forelse($registros as $registro)
                <option value="{{ $registro->id }}"  @if(in_array($registro->id, $nomes)) selected @endif >{{ $registro->nome }}</option>
            @empty
                <option>Não há professores cadastrados</option>
            @endforelse
        </select>
    </div>
</div>
