<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Controle de Portaria</title>
</head>
<body>
    <h1>Registre a Entrada de Colaboradores</h1>

    <?php
    // Inclui o arquivo de configuração do banco de dados
    include "config/db_config.php";

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Coleta dados do formulário
        $nome = $_POST["nome"];
        $data_nascimento = $_POST["data_nascimento"];
        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];

        // Insere os dados no banco de dados
        $sql = "INSERT INTO pessoa (nome, data_nascimento, cpf, rg) VALUES ('$nome', '$data_nascimento', '$cpf', '$rg')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro de colaborador inserido com sucesso.";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
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

        <input type="submit" value="Registrar Entrada">
    </form>
</body>
</html>