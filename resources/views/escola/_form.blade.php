<div class="form-group">
    <label for="inputNome">Nome</label>
    <input type="text" name="nome" id="inputNome" class="form-control" placeholder="Escola" value="{{isset($registro->nome) ? $registro->nome : ''}}">
</div>
<div class="form-group">
    <label for="inputTelefone">Telefone</label>
    <input type="text" name="telefone" id="inputTelefone" class="form-control" placeholder="Telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
</div>
<div class="form-group">
    <label for="inputLogin">Login</label>
    <input type="text" name="login" id="inputLogin" class="form-control" placeholder="login" value="{{isset($registro->login) ? $registro->login : ''}}">
</div>
<div class="form-group">
    <label for="inputSenha">Senha</label>
    <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="senha" value="{{isset($registro->senha) ? $registro->senha : ''}}">
</div>