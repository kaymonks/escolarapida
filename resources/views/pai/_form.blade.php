<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{isset($registro->nome) ? $registro->nome : ''}}">
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
    <label for="inputEmail">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Email" id="inputEmail" value="{{isset($registro->email) ? $registro->email : '' }}">
</div>

<div class="form-group">
    <label>Sexo</label>
    <div class="radio">
        <label>
            <input type="radio" name="sexo" id="sexoRadio" value="m" @if(isset($registro) and ($registro->sexo == 'm')) checked @endif>Masculino
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="sexo" id="sexoRadio2" value="f" @if(isset($registro) and $registro->sexo == 'f') checked @endif>Feminino
        </label>
    </div>
</div>

<fieldset>
    <legend>Endereço</legend>
    <div class="form-group">
        <label for="inputEndereco">Endereço</label>
        <input type="text" name="endereco" id="inputEndereco" class="form-control" placeholder="Endereço" value="{{ isset($registro->endereco) ? $registro->endereco : '' }}">
    </div>
    <div class="form-group">
        <label for="inputCEP">CEP</label>
        <input type="text" name="cep" id="inputCEP" class="form-control" placeholder="CEP" value="{{ isset($registro->cep) ? $registro->cep : '' }}">
    </div>
    <div class="form-group">
        <label for="inputNumero">Número</label>
        <input type="text" name="numero" id="inputNumero" class="form-control" placeholder="Numero" value="{{ isset($registro->numero) ? $registro->numero : '' }}">
    </div>
    <div class="form-group">
        <label for="inputBairro">Bairo</label>
        <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" value="{{ isset($registro->bairro) ? $registro->bairro : '' }}">
    </div>
    <div class="form-group">
        <label for="inputEstado">Estado</label>
        <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado" value="{{ isset($registro->estado) ? $registro->estado : '' }}">
    </div>
    <div class="form-group">
        <label for="inputCidade">Cidade</label>
        <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade" value="{{ isset($registro->cidade) ? $registro->cidade : '' }}">
    </div>
</fieldset>