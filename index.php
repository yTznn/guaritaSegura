<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle de Portaria</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos adicionais (opcional) */
        body {
            margin: 50px;
        }

        .panel {
            max-width: 600px;
            margin: auto;
        }

        .panel a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            color: #333;
        }

        .panel a:hover {
            background-color: #e9e9e9;
        }
    </style>
</head>
<body>
    <div class="panel">
        <h1 class="text-center">Painel Principal</h1>

        <!-- Botão para o Dashboard de Informações -->
        <a href="dashboard.php" class="btn btn-light btn-block">Dashboard de Informações</a>

        <!-- Verifica se o usuário tem permissão para cadastro de usuário -->
        <?php
        if (isset($_SESSION['logado']) && $_SESSION['logado'] === true && $_SESSION['papel'] !== 'Porteiro') {
            echo '<a href="usuarios/criar_usuario.php" class="btn btn-light btn-block">Cadastro de Usuário</a>';
        }
        ?>

        <!-- Botão para Cadastro de Pessoa -->
        <a href="cadastro_pessoa.php" class="btn btn-light btn-block">Cadastro de Pessoa</a>

        <!-- Botão para Entrada de Pessoas -->
        <a href="usuarios/realizar_entrada.php" class="btn btn-light btn-block">Entrada de Pessoas</a>

        <!-- Botão para Saída de Pessoas -->
        <a href="usuarios/realizar_saida.php" class="btn btn-light btn-block">Saída de Pessoas</a>

        <!-- Botão para Alterar Cadastro de Pessoas -->
        <a href="alterar_cadastro.php" class="btn btn-light btn-block">Alterar Cadastro de Pessoas</a>

        <!-- Botão para Sair do Sistema -->
        <a href="login/logout.php" class="btn btn-light btn-block">Sair do Sistema</a>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Inicia a sessão (se ainda não estiver iniciada)
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    // Verifica se o papel do usuário é "Porteiro"
    if ($_SESSION['papel'] === 'Porteiro') {
        // Se o papel for "Porteiro", redireciona para o index ou outra página desejada
        header("Location: index.php");
        exit();
    }
}
?>