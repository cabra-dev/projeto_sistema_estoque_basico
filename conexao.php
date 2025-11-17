<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "estoque_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>