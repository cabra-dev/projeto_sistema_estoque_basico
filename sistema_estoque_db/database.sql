-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS estoque_db;
USE estoque_db;

-- =============================
-- TABELA DE USUÁRIOS
-- =============================
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    senha VARCHAR(20) NOT NULL
);

-- Usuário padrão do sistema
INSERT INTO usuarios (usuario, senha)
VALUES ('admin', '1234');

-- =============================
-- TABELA DE PRODUTOS
-- =============================
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL
);
