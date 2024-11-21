<?php
// Conectar ao banco de dados
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "produtos_naturais";

// Criação da conexão
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

// Verificação de conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    error_log("Dados recebidos: username = $username, password = $password");

    if (!$username || !$password) {
        echo json_encode(["success" => false, "message" => "Usuário e senha são obrigatórios."]);
        exit();
    }

    $stmt = $conn->prepare("SELECT id, senha FROM usuarios WHERE username = ?");
    if (!$stmt) {
        error_log("Erro na preparação da consulta: " . $conn->error);
        echo json_encode(["success" => false, "message" => "Erro no servidor."]);
        exit();
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senha_hash);
        $stmt->fetch();

        if (password_verify($password, $senha_hash)) {
            echo json_encode(["success" => true, "message" => "Login realizado com sucesso!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Senha incorreta."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Usuário não encontrado."]);
    }

    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Método inválido."]);
}

$conn->close()
?>
