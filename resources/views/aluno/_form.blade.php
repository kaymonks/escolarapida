@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="inputNome">Nome</label>
        <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{isset($registro->nome) ? $registro->nome : old('nome') }}">
    </div>
</div>

<div class="col-sm-12 col-md-4 col-lg-2">
    <div class="form-group">
        <label for="inputDataNascimento">Data de Nascimento</label>
        <input type="text" name="data_nascimento" class="form-control" id="date" value="{{isset($registro->data_nascimento) ? $registro->data_nascimento : old('data_nascimento')}}">
    </div>
</div>

<div class="col-sm-12 col-md-4 col-lg-2">
    <div class="form-group">
        <label for="">Selecione a Turma</label>
        <select name="turma_id" class="form-control select2 select2-hidden-accessible" data-placeholder="Selecione a turma" style="width: 100%" aria-hidden="true" tabindex="-1">
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}"  @if(isset($turmaNome) and $turma->id==$turmaNome->id) selected @endif >{{ $turma->ano }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-sm-12 col-md-4 col-lg-2">
    <div class="form-group">
        <label>Sexo</label><br>
        <label class="radio-inline">
            <input type="radio" name="sexo" value="m" @if(isset($registro) and ($registro->sexo == 'm')) checked @else {{ old('sexo')=="m" ? 'checked' : '' }} @endif > Masculino&nbsp;
        </label>

        <label class="radio-inline">
            <input type="radio" name="sexo" value="f" @if(isset($registro) and $registro->sexo == 'f') checked @else {{ old('sexo')=="f" ? 'checked' : '' }} @endif > Feminino
        </label>
    </div>
</div>

<div class="col-sm-12 col-md-4 col-lg-2">
    <div class="form-group">
        <label for="inputTelefone">Telefone</label>
        <input type="text" name="telefone" class="form-control" id="inputTelefone" value="{{isset($telefone->telefone) ? $telefone->telefone : old('telefone')}}">
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <div class="form-group">
        <label for="">Responsáveis</label>
        <select class="form-control select2 select2-hidden-accessible" multiple="" name="pai_id[]" style="width: 100%;" tabindex="-1" aria-hidden="true">
            @foreach($pais as $pai)
                <option value="{{ $pai->id }}" @if(in_array($pai->id, $nomepais)) selected @endif >{{ $pai->nome }}</option>
            @endforeach
        </select>
    </div>
</div>