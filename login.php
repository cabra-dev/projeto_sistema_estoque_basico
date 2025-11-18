<?php
session_start();
require "conexao.php"; // Assume que $conn é mysqli

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["user"];
    $senha = $_POST["pass"];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha); // "ss" significa duas strings
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION["logado"] = true;
        header("Location: produtos.php");
        exit;
    } else {
        $erro = "Usuário ou senha incorreto!";
    }

    $stmt->close();
}

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
        <h1>Login</h1>

        <?php if (isset($erro)) echo "<p class='erro'>$erro</p>"; ?>

        <form method="POST">
            <label>Usuário:</label>
            <input type="text" name="user">
            <label>Senha:</label>
            <input type="password" name="pass">
            <button class="btn">Entrar</button>
        </form>
    </div>
</body>
</html>