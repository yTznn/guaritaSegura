<!DOCTYPE html>
<html>
<head>
    <title>Alterar Cadastro de Pessoas</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="login/logout.php">Sair do Sistema</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Alterar Cadastro de Pessoas</h1>

        <?php
        include "config/db_config.php";

        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM pessoa WHERE id_pessoa = $id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <form action="atualizar_pessoa.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id_pessoa']; ?>">

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>">
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $row['cpf']; ?>">
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" id="rg" name="rg" value="<?php echo $row['rg']; ?>">
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $row['data_nascimento']; ?>">
            </div>

            <button type="submit" class="btn btn-success mr-2">Alterar Dados</button>
            <button type="button" class="btn btn-danger" onclick="confirmDelete()">Excluir Pessoa</button>
        </form>
        <?php
            } else {
                echo "Nenhuma pessoa encontrada com este ID.";
            }
        } else {
            echo "ID de pessoa não fornecido.";
        }
        ?>

        <!-- Bootstrap JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            function confirmDelete() {
                if (confirm("Tem certeza que deseja excluir esta pessoa?")) {
                    window.location.href = "excluir_pessoa.php?id=<?php echo $row['id_pessoa']; ?>";
                }
            }
        </script>
    </div>
</body>
</html>