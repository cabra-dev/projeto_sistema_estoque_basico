<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Produtos - Sistema de Estoque</title>
  <link rel="stylesheet" href="css/estilo.css"> <!-- Importa o arquivo css-->
</head>
<body>
  <div class="container"> <!-- Container principal que centraliza o conteúdo-->

    <header> 
      <h1>Controle de Estoque</h1> <!-- Título principal da página -->
      <button id="logout" class ="btn small">Sair</button> <!-- Botão de logout -->
    </header>

<!-- Seção para cadastrar os produtos -->
    <section class="card">
      <h2>Novo Produto</h2>
      <form id="formProduto"> <!-- Formulário que será manipulado no JavaScript -->
        <input type="text" id="nome" placeholder="Nome do produto" required> <!-- Campo para o nome -->
        <input type="number" id="quantidade" placeholder="Quantidade" required> <!-- Campo numérico -->
        <input type="number" id="preco" placeholder="Preço" step="0.01" required> <!-- Campo para o preço -->
        <button type="submit" class="btn">Cadastrar</button> <!-- Botão de envio --> 
      </form>
    </section>

    <!-- Seção de exibição dos produtos -->
    <section class="card">
      <h2>Lista de Produtos</h2>

      <table id="tabela">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço (R$)</th>
            <th>Preço (US$)</th> <!-- Campo adicional para converção da moeda-->
            <th>Ações</th> <!-- Coluna para botões de remoção -->
          </tr>
        </thead>

        <tbody id="lista"></tbody> <!-- Corpo da tabela, onde os produtos serão inseridos dinamicamente -->
      </table>
    </section>
    
  </div>

  <!-- Lincando o js q vai ser responsável por controlar toda a lógica da página -->
  <script src="js/app.js"></script>
</body>
</html>
