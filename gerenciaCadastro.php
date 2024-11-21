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

// Processar o formulário ao ser enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $senha = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

    // Preparar e executar a inserção
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, username, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $username, $email, $telefone, $senha);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
