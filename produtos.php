<?php
session_start();
if (!isset($_SESSION["logado"])) {
    header("Location: login.php");
    exit;
}

require "conexao.php";

// CADASTRO
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];

    $conn->query("INSERT INTO produtos (nome, quantidade, preco)
                  VALUES ('$nome', '$quantidade', '$preco')");
}

// EXCLUSÃO
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $conn->query("DELETE FROM produtos WHERE id = $id");
}

$produtos = $conn->query("SELECT * FROM produtos");

// EDITAR PRODUTO
$editando = false;
$produtoEdit = null;

if (isset($_GET["edit"])) {
    $editando = true;
    $id = $_GET["edit"];
    $result = $conn->query("SELECT * FROM produtos WHERE id = $id");
    $produtoEdit = $result->fetch_assoc();
}

// SALVAR EDIÇÃO
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];

    $conn->query("
        UPDATE produtos
        SET nome='$nome', quantidade='$quantidade', preco='$preco'
        WHERE id=$id
    ");

    header("Location: produtos.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/estilo.css">
<script src="js/app.js" defer></script>
<title>Produtos</title>
</head>

<body>
<button id="logout" onclick="window.location.href='login.php'">Sair</button>

<div class="container">
    <h1>Lista de Produtos</h1>

    <form method="POST">
    <?php if ($editando): ?>
        <input type="hidden" name="id" value="<?= $produtoEdit['id'] ?>">
    <?php endif; ?>

    <label>Nome:</label>
    <input type="text" name="nome" value="<?= $editando ? $produtoEdit['nome'] : '' ?>">

    <label>Quantidade:</label>
    <input type="number" name="quantidade" value="<?= $editando ? $produtoEdit['quantidade'] : '' ?>">

    <label>Preço (R$):</label>
    <input type="number" step="0.01" name="preco" value="<?= $editando ? $produtoEdit['preco'] : '' ?>">

    <?php if ($editando): ?>
        <button class="btn">Salvar Alterações</button>
        <a href="produtos.php" class="btn danger">Cancelar</a>
        <input type="hidden" name="update" value="1">
    <?php else: ?>
        <button class="btn">Cadastrar</button>
    <?php endif; ?>
</form>

        <label>Nome:</label>
        <input type="text" name="nome">

        <label>Quantidade:</label>
        <input type="number" name="quantidade">

        <label>Preço (R$):</label>
        <input type="number" step="0.01" name="preco">

        <button class="btn">Cadastrar</button>
    </form>

    <table>
        <tr>
            <th>Produto</th>
            <th>Qtd</th>
            <th>Preço (R$)</th>
            <th>Preço (US$)</th>
            <th>Ações</th>
        </tr>

        <?php while($p = $produtos->fetch_assoc()): ?>
        <tr>
            <td><?= $p['nome'] ?></td>
            <td><?= $p['quantidade'] ?></td>
            <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
            <td class="usd" data-preco="<?= $p['preco'] ?>"></td>

            <td>
                <a class="btn" href="produtos.php?edit=<?= $p['id'] ?>">Editar</a>
                <a class="btn danger" href="produtos.php?delete=<?= $p['id'] ?>">Excluir</a>
            </td>

        </tr>
        <?php endwhile; ?>
    </table>

</div>
</body>
</html>
