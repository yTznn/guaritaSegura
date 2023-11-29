<?php
include "../config/db_config.php"; // Inclua o arquivo de configuração do banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Criptografe a senha (use o método de criptografia seguro adequado, não armazene senhas em texto plano)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insira os dados na tabela usuarios
    $sql = "INSERT INTO usuarios (username, senha, papel_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $username, $hashedPassword, $role);
    $stmt->execute();

    // Verifique se a inserção foi bem-sucedida e redirecione conforme necessário
    if ($stmt->affected_rows > 0) {
        // Redirecione para alguma página de sucesso
        header("Location: sucesso.php");
        exit();
    } else {
        // Redirecione para alguma página de erro
        header("Location: erro.php");
        exit();
    }
}
?>