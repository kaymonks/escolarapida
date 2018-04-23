@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-12">
        <div class="form-group">
            <label for="inputAno" class="col-sm-4 control-label">Turma</label>
            <div class="col-sm-8 col-md-5">
                <input type="text" name="ano" placeholder="Ano" class="form-control" id="inputAno" value="{{isset($turmas->ano) ? $turmas->ano : old('ano')}}">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-4 control-label">Selecione o(s) Professor(es)</label>
            <div class="col-sm-8 col-md-5">
                <select multiple name="professor[]" class="form-control">
                    @forelse($registros as $registro)
                        <option value="{{ $registro->id }}"  @if(in_array($registro->id, $nomes)) selected @endif >{{ $registro->nome }}</option>
                    @empty
                        <option>Não há professores cadastrados</option>
                    @endforelse
                </select>
            </div>
        </div>
</div>
