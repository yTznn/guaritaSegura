<?php
// Inclui o arquivo de configuração do banco de dados e a classe Pessoa
include "config/db_config.php";
include "classes/pessoa.php"; // Letra minúscula

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta dados do formulário
    $nome = $_POST["nome"];
    $data_nascimento = $_POST["data_nascimento"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];

    // Cria uma instância da classe Pessoa e passa a conexão com o banco de dados
    $pessoa = new Pessoa($conn);

    // Chama o método para inserir uma pessoa
    if ($pessoa->inserirPessoa($nome, $data_nascimento, $cpf, $rg)) {
        // Se o cadastro foi bem-sucedido, redireciona para a página de sucesso
        header("Location: cadastro_sucesso.php");
        exit();
    } else {
        echo "Erro ao cadastrar a pessoa.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Pessoa</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Página Inicial</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login/logout.php">Sair do Sistema</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Cadastro de Pessoa</h1>

        <form method="post" action="">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" name="data_nascimento" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" pattern="[0-9]{11}" title="Por favor, digite apenas números (11 dígitos)" required>
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" name="rg" pattern="[0-9]+" title="Por favor, digite apenas números">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Pessoa</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>