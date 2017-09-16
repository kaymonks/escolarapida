<input type="text" name="nome" placeholder="Escola" value="{{isset($registro->nome) ? $registro->nome : ''}}">
<input type="text" name="telefone" placeholder="Telefone" value="{{isset($registro->telefone) ? $registro->telefone : ''}}">
<input type="text" name="login" placeholder="login" value="{{isset($registro->login) ? $registro->login : ''}}">
<input type="password" name="senha" placeholder="senha" value="{{isset($registro->senha) ? $registro->senha : ''}}">