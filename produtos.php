<?php
session_start();
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true) {
    header("Location: login.php");
    exit;
}

require "conexao.php";

// CADASTRO ou ATUALIZAÇÃO
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $preco = $_POST["preco"];

    if (isset($_POST["update"])) {
        // Atualização
        $id = $_POST["id"];
        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, quantidade = ?, preco = ? WHERE id = ?");
        $stmt->bind_param("sidi", $nome, $quantidade, $preco, $id);  // s=string, d=double, i=int
        $stmt->execute();
        $stmt->close();
    } else {
        // Cadastro
        $stmt = $conn->prepare("INSERT INTO produtos (nome, quantidade, preco) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $nome, $quantidade, $preco);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: produtos.php");
    exit;
}

// EXCLUSÃO
if (isset($_GET["delete"])) {
    $id = $_GET["delete"];
    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: produtos.php");
    exit;
}

// LISTAGEM
// Busca todos os produtos do banco para exibir na tabela
$result = $conn->query("SELECT * FROM produtos");

// EDITAR (preenche form)
$editando = false;
$produtoEdit = null;
if (isset($_GET["edit"])) {
    $editando = true;
    $id = $_GET["edit"];
    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $edit_result = $stmt->get_result();
    $produtoEdit = $edit_result->fetch_assoc();
    $stmt->close();
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
    <button id="logout" onclick="window.location.href='logout.php'">Sair</button>  <!-- Mude pra logout.php -->

    <div class="container">
        <h1>Lista de Produtos</h1>

        <!-- Form unificado para cadastro/edição -->
        <form method="POST">
            <?php if ($editando): ?>
                <input type="hidden" name="id" value="<?= $produtoEdit['id'] ?>">
                <input type="hidden" name="update" value="1">
            <?php endif; ?>

            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $editando ? $produtoEdit['nome'] : '' ?>" required>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" value="<?= $editando ? $produtoEdit['quantidade'] : '' ?>" required>

            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" value="<?= $editando ? $produtoEdit['preco'] : '' ?>" required>

            <?php if ($editando): ?>
                <button class="btn">Salvar Alterações</button>
                <a href="produtos.php" class="btn danger">Cancelar</a>
            <?php else: ?>
                <button class="btn">Cadastrar</button>
            <?php endif; ?>
        </form>

        <table>
            <tr>
                <th>Produto</th>
                <th>Qtd</th>
                <th>Preço (R$)</th>
                <th>Preço (US$)</th>
                <th>Ações</th>
            </tr>

            <?php if ($result->num_rows > 0): ?>
                <?php while ($p = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['nome']) ?></td>  <!-- Segurança contra XSS -->
                        <td><?= $p['quantidade'] ?></td>
                        <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                        <td class="usd" data-preco="<?= $p['preco'] ?>"></td>
                        <td>
                            <a class="btn" href="produtos.php?edit=<?= $p['id'] ?>">Editar</a>
                            <a class="btn danger" href="produtos.php?delete=<?= $p['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5">Nenhum produto cadastrado.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>