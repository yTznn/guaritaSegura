<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Pessoa</title>
</head>
<body>
    <h1>Cadastro de Pessoa</h1>

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

        // Chama o método para cadastrar uma pessoa
        $pessoa->cadastrarPessoa($nome, $data_nascimento, $cpf, $rg);

        echo "Pessoa cadastrada com sucesso.";
    }
    ?>

    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="data_nascimento">Data de Nascimento:</label>
        <input type="date" name="data_nascimento" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" required><br>

        <label for="rg">RG:</label>
        <input type="text" name="rg"><br>

        <input type="submit" value="Cadastrar Pessoa">
    </form>
</body>
</html>