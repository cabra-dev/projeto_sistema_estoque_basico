<?php

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema de Estoque</title>
  <link rel="stylesheet" href="css/estilo.css"> <!-- Importa o arquivo css-->
</head>
<body>

  <div class="container"> <!-- Container principal que centraliza o conteúdo-->

    <h1>Sistema de Estoque</h1><!-- Título principal da página -->
    <div class="card">

      <!-- Criação do formulário para login -->
      <h2>Login</h2>
      <form id="formLogin"> <!-- O id será utilizdo pelo js para capturar os dados do envio-->

        <label>Usuário</label>
        <input type="text" id="user" required> <!-- Campo de texto para coletar o nome do usário -->

        <label>Senha</label>
        <input type="password" id="pass" required> <!-- Campo para a senha -->

        <button type="submit" class="btn">Entrar</button> <!-- Botão para enviar o formulário -->
        
      </form>

    </div>

  </div>
  <!-- Lincando o js q vai ser responsável por fazer a verificação e redirecionar o usuário-->
  <script src="js/app.js"></script>
</body>
</html>