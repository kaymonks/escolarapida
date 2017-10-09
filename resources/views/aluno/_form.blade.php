<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
</div>

<div class="form-group">
    <label for="">Selecione o Pai</label>
    <select name="pai_id" class="form-control">
        <option selected>Pai</option>
        @foreach($pais as $pai)
            <option value="{{ $pai->id }}"  @if(isset($paiNome) and $pai->id==$paiNome->id) selected @endif>{{ $pai->nome }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Selecione a Turma</label>
    <select name="turma_id" class="form-control">
        <option>Turma</option>
        @foreach($turmas as $turma)
            <option value="{{ $turma->id }}"  @if(isset($turmaNome) and $turma->id==$turmaNome->id) selected @endif >{{ $turma->ano }}</option>
        @endforeach
    </select>
</div>