<?php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = array();

// Destrói o cookie de sessão, se existir
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Finaliza a sessão
session_destroy();

// Redireciona para a página de login
header("Location: ../login/login.php");
exit;
?>