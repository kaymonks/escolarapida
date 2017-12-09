@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-6">
    <legend>Dados pessoais</legend>
    <div class="row">
        <div class="form-group col-lg-12">
            <label for="inputNome">Nome</label>
            <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{ isset($registro->nome) ? $registro->nome : '' }}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6">
            <label for="date">Data de Nascimento</label>
            <input type="text" name="data_nascimento" placeholder="Data de Nascimento" class="form-control" id="date" value="{{isset($registro->data_nascimento) ? $registro->data_nascimento : ''}}">
        </div>
        <div class="form-group col-lg-6">
            <label for="inputTelefone">Telefone</label>
            <input type="text" name="telefone" placeholder="Telefone" class="form-control"  id="inputTelefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
            <input type="hidden" name="telefone_id" value="{{ isset($registro->telefone) ? $registro->telefone_id : '' }}">
        </div>
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
</div>
<!-- /.col (left) -->
<div class="col-md-6">
    <fieldset>
        <legend>Endereço</legend>

        <div class="row">
            <div class="form-group col-lg-6">
                <label for="inputEndereco">Endereço</label>
                <input type="text" name="endereco" id="inputEndereco" class="form-control" placeholder="Endereço" value="{{ isset($registro->endereco) ? $registro->endereco : '' }}">
            </div>
            <div class="form-group col-lg-6">
                <label for="inputCEP">CEP</label>
                <input type="text" name="cep" id="inputCEP" class="form-control" placeholder="CEP" value="{{ isset($registro->cep) ? $registro->cep : '' }}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-lg-4">
                <label for="inputNumero">Número</label>
                <input type="text" name="numero" id="inputNumero" class="form-control" placeholder="Numero" value="{{ isset($registro->numero) ? $registro->numero : '' }}">
            </div>
            <div class="form-group col-lg-8">
                <label for="inputBairro">Bairro</label>
                <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" value="{{ isset($registro->bairro) ? $registro->bairro : '' }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="inputEstado">Estado</label>
                <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado" value="{{ isset($registro->estado) ? $registro->estado : '' }}">
            </div>
            <div class="form-group col-lg-6">
                <label for="inputCidade">Cidade</label>
                <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade" value="{{ isset($registro->cidade) ? $registro->cidade : '' }}">
            </div>
        </div>
    </fieldset>
</div>
<!-- /.col (right) -->
<div class="clearfix"></div>
<hr>
<div class="col-md-6">
    <fieldset>
        <legend>Login</legend>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="inputEmail">Email</label>
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" value="{{isset($registro->email) ? $registro->email : ''}}">
            </div>
            <div class="form-group col-lg-6">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="senha" value="{{isset($registro->senha) ? $registro->senha : ''}}">
            </div>
        </div>
    </fieldset>
</div>