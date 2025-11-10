<?php

?>

<DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Produtos - Sistema de Estoque</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Controle de Estoque</h1>
      <button id="logout" class ="btn small">Sair</button>
    </header>

    <section class="card">
      <h2>Novo Produto</h2>
      <form id="formProduto">
        <input type="text" id="nome" placeholder="Nome do produto" required>
        <input type="number" id="quantidade" placeholder="Quantidade" required>
        <input type="number" id="preco" placeholder="Preço" step="0.01" required>
        <button type="submit" class="btn">Cadastrar</button>
      </form>
    </section>

    <section class="card">
      <h2>Lista de Produtos</h2>
      <table id="tabela">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody id="lista"></tbody>
      </table>
    </section>
  </div>
  <script src="js/app.js"></script>
</body>
</html>
?>