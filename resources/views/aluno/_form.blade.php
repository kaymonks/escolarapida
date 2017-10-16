<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
</div>

<div class="form-group">
    <label for="">Pai</label>
    <select name="pai_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecione o pai" style="width: 100%;" aria-hidden="true" tabindex="-1">
        @foreach($pais as $pai)

            <option value="{{ $pai->id }}"  @if(isset($paiNome) and ($pai->id==$paiNome->id)) selected  @endif>{{ $pai->nome }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Selecione a Turma</label>
    <select name="turma_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecione a turma" style="width: 100%" aria-hidden="true" tabindex="-1">
        @foreach($turmas as $turma)
            <option value="{{ $turma->id }}"  @if(isset($turmaNome) and $turma->id==$turmaNome->id) selected @endif >{{ $turma->ano }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="inputDataNascimento">Data de Nascimento</label>
    <input type="text" name="data_nascimento" placeholder="Data de Nascimento" class="form-control" id="inputDataNascimento" value="{{isset($registro->data_nascimento) ? $registro->data_nascimento : ''}}">
</div>

<div class="form-group">
    <label for="inputTelefone">Telefone</label>
    <input type="text" name="telefone" placeholder="Telefone" class="form-control" id="inputTelefone" value="{{isset($telefone->telefone) ? $telefone->telefone : ''}}">
</div>

<div class="form-group">
    <label>Sexo</label><br>
    <div class="radio">
        <label>
            <input type="radio" name="sexo" class="" value="m" @if(isset($registro) and ($registro->sexo == 'm')) checked @endif > Masculino
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="sexo" class="" value="f" @if(isset($registro) and $registro->sexo == 'f') checked @endif> Feminino
        </label>
    </div>
</div>