
<?php
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "produtos_naturais";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);       
        echo "<script>console.log('Conectou');</script>";
        return $conn;
    } catch (Exception $e) {
        die("Erro de conexão: " . $e->getMessage());
    }
?>

	