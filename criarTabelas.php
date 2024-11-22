<?php
// Configuração de conexão ao banco de dados
$host = '127.0.0.1';
$dbname = 'produtos_naturais'; // Certifique-se de que o banco já existe
$username = 'seu_usuario';
$password = 'sua_senha';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Código SQL do dump
    $sql = <<<SQL
        SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
        START TRANSACTION;
        SET time_zone = "+00:00";


        -- Estrutura da tabela `carrinho`
        CREATE TABLE IF NOT EXISTS `carrinho` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `usuario_id` int(11) NOT NULL,
        `produto_id` int(11) NOT NULL,
        `quantidade` int(11) NOT NULL,
        `preco` decimal(10,2) NOT NULL,
        `data_adicionado` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`),
        KEY `usuario_id` (`usuario_id`),
        KEY `produto_id` (`produto_id`),
        FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
        FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        -- Estrutura da tabela `pedidos`
        CREATE TABLE IF NOT EXISTS `pedidos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `usuario_id` int(11) NOT NULL,
        `produto_id` int(11) NOT NULL,
        `quantidade` int(11) NOT NULL,
        `data_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`),
        KEY `usuario_id` (`usuario_id`),
        KEY `produto_id` (`produto_id`),
        FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
        FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        -- Estrutura da tabela `pagamentos`
        CREATE TABLE IF NOT EXISTS `pagamentos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `pedido_id` int(11) NOT NULL,
        `metodo_pagamento` ENUM('cartão', 'boleto', 'transferência') NOT NULL,
        `status` ENUM('pendente', 'completo', 'falhado') DEFAULT 'pendente',
        `data_pagamento` timestamp DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`),
        FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        -- Estrutura da tabela `produtos`
        CREATE TABLE IF NOT EXISTS `produtos` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(100) NOT NULL,
        `descricao` text DEFAULT NULL,
        `preco` decimal(10,2) NOT NULL,
        `imagem` varchar(255) DEFAULT NULL,
        `categoria_id` int(11) DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`),
        FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE SET NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        -- Estrutura da tabela `categorias`
        CREATE TABLE IF NOT EXISTS `categorias` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(100) NOT NULL,
        `descricao` text DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        -- Estrutura da tabela `usuarios`
        CREATE TABLE IF NOT EXISTS `usuarios` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `nome` varchar(100) NOT NULL,
        `username` varchar(50) NOT NULL UNIQUE,
        `email` varchar(100) NOT NULL UNIQUE,
        `telefone` varchar(15) DEFAULT NULL,
        `senha` varchar(255) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

        -- Estrutura da tabela `avaliacoes`
        CREATE TABLE IF NOT EXISTS `avaliacoes` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `produto_id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `nota` int(1) CHECK(nota >= 1 AND nota <= 5) NOT NULL,
        `comentario` text DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`),
        FOREIGN KEY (`produto_id`) REFERENCES `produtos`(`id`) ON DELETE CASCADE,
        FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        SQL;

    // Executando o SQL
    $pdo->exec($sql);

    echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar tabelas: " . $e->getMessage();
}
