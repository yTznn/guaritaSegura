<?php
include "../config/db_config.php"; // Inclua o arquivo de configuração do banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Consulta para obter os dados do usuário pelo nome de usuário fornecido
    $sql = "SELECT id_usuario, username, senha, papel_id FROM usuarios WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Se o usuário existir
        $row = $result->fetch_assoc();
        $hashedPassword = $row['senha'];
        $papelUsuario = $row['papel_id']; // Aqui você pega o papel do usuário do banco de dados

        // Verificar a senha
        if (password_verify($password, $hashedPassword)) {
            // Senha correta, inicia a sessão e redireciona para o index.php
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['papel'] = $papelUsuario; // Salva o papel do usuário na sessão
            header("Location: ../index.php");
            exit();
        } else {
            // Senha incorreta
            $erro = "Credenciais Incorretas";
            header("Location: login.php?erro=" . urlencode($erro));
            exit();
        }
    } else {
        // Usuário não encontrado
        $erro = "Usuário ou senha incorretos";
        header("Location: login.php?erro=" . urlencode($erro));
        exit();
    }
}
?>