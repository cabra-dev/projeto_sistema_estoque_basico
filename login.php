<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema de Estoque</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <div class="container">
    <h1>Sistema de Estoque</h1>
    <div class="card">
      <h2>Login</h2>
      <form id="formLogin">
        <label>Usuário</label>
        <input type="text" id="user" required>
        <label>Senha</label>
        <input type="password" id="pass" required>
        <button type="submit" class="btn">Entrar</button>
      </form>
      <p class="hint">Usuário: <b>admin</b> | Senha: <b>1234</b></p>
    </div>
  </div>
  <script src="js/app.js"></script>
</body>
</html>


