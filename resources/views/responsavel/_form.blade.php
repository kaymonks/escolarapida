@if(isset($errors) and count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="col-md-6">
    <legend>Dados pessoais</legend>
    <div class="form-group">
        <label for="inputNome">Nome</label>
        <input type="text" name="nome" placeholder="Nome" class="form-control" id="inputNome" value="{{isset($registro->nome) ? $registro->nome : old('nome')}}">
    </div>
    <div class="row">
        <div class="form-group col-sm-6 col-lg-3">
            <label for="inputDataNascimento">Data de Nascimento</label>
            <input type="text" name="data_nascimento" placeholder="Data de Nascimento" class="form-control" id="date" value="{{isset($registro->data_nascimento) ? $registro->data_nascimento : old('data_nascimento')}}">
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            <label for="inputTelefone">Telefone</label>
            <input type="text" name="telefone" placeholder="Telefone" class="form-control" id="inputTelefone" value="{{isset($telefone->telefone) ? $telefone->telefone : old('telefone')}}">
            <input type="hidden" name="telefone_id" value="{{ isset($registro->telefone) ? $registro->telefone_id : old('telefone_id') }}">
        </div>

        <div class="form-group col-sm-6 col-lg-4">
            <label>Sexo</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" id="sexoRadio" value="m" @if(isset($registro) and ($registro->sexo == 'm')) checked @else {{ old('sexo') == "m" ? 'checked' : '' }} @endif>Masculino
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="radio">
                        <label>
                            <input type="radio" name="sexo" id="sexoRadio2" value="f" @if(isset($registro) and $registro->sexo == 'f') checked @else {{ old('sexo')=="f" ? 'checked' : '' }} @endif>Feminino
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <fieldset>
        <legend>Endereço</legend>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="inputEndereco">Endereço</label>
                <input type="text" name="endereco" id="inputEndereco" class="form-control" placeholder="Endereço" value="{{ isset($registro->endereco) ? $registro->endereco : old('endereco') }}">
            </div>
            <div class="form-group col-sm-4 col-lg-4">
                <label for="inputCEP">CEP</label>
                <input type="text" name="cep" id="inputCEP" class="form-control" placeholder="CEP" value="{{ isset($registro->cep) ? $registro->cep : old('cep') }}">
            </div>
            <div class="form-group col-sm-2 col-lg-2">
                <label for="inputNumero">Número</label>
                <input type="text" name="numero" id="inputNumero" class="form-control" placeholder="Numero" value="{{ isset($registro->numero) ? $registro->numero : old('numero') }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-6 col-lg-4">
                <label for="inputEstado">Estado</label>
                <input type="text" name="estado" id="inputEstado" class="form-control" placeholder="Estado" value="{{ isset($registro->estado) ? $registro->estado : old('estado') }}">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                <label for="inputCidade">Cidade</label>
                <input type="text" name="cidade" id="inputCidade" class="form-control" placeholder="Cidade" value="{{ isset($registro->cidade) ? $registro->cidade : old('cidade') }}">
            </div>
            <div class="form-group col-sm-6 col-lg-4">
                <label for="inputBairro">Bairo</label>
                <input type="text" name="bairro" id="inputBairro" class="form-control" placeholder="Bairro" value="{{ isset($registro->bairro) ? $registro->bairro : old('bairro') }}">
            </div>
        </div>
    </fieldset>
</div>

<div class="clearfix"></div>
<hr>
<div class="col-md-6">
    <fieldset>
        <legend>Login</legend>
        <div class="row">
            <div class="form-group col-sm-6">
                <label for="inputEmail">Email</label>
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" value="{{isset($registro->email) ? $registro->email : old('email') }}">
            </div>
            <div class="form-group col-sm-6">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="senha" value="{{isset($registro->senha) ? $registro->senha : old('senha')}}">
            </div>
        </div>
    </fieldset>
</div>