<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" name="nome" id="inputNome" placeholder="Professor" class="form-control" value="{{isset($registro->nome) ? $registro->nome : ''}}">
</div>

<div class="form-group">
    <label for="inputTelefone">Telefone</label>
    <input type="text" name="telefone" id="inputTelefone" placeholder="Telefone" class="form-control" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
</div>

<div class="form-group">
    <label for="inputLogin">Login</label>
    <input type="text" name="login" id="inputLogin" placeholder="login" class="form-control" value="{{isset($registro->login) ? $registro->login : ''}}">
</div>

<div class="form-group">
    <label for="inputSenha">Senha</label>
    <input type="password" name="senha" id="inputSenha" placeholder="senha" class="form-control" value="{{isset($registro->senha) ? $registro->senha : ''}}">
</div>