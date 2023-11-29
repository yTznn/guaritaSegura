<?php

    // Inclua o arquivo de configuração do banco de dados
    include "../config/db_config.php";
    $sql = "SELECT nome, id_pessoa FROM pessoa ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $resultado = '';
    while($row = $result->fetch_assoc()){
        $resultado .= '<option value="'.$row['id_pessoa'].'">'.$row['nome'].'</option>';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Realizar Entrada de Pessoas</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/logout.php">Sair do Sistema</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Realizar Entrada de Pessoas</h1>

        <form method="post" action="" class="mt-4" id="formEntrada">

            
            <div class="form-group">
                <label for="Pessoa">Pessoa:</label>
                <select name="pessoa" id="pessoa">
                    <?php
                        echo $resultado;
                    ?>
                </select>
            </div>
            
            

            <!-- <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" name="data_nascimento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" class="form-control" id="inputCPF" required>
            </div>

            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" name="rg" class="form-control">
            </div> -->

            <button type="submit" class="btn btn-primary">Registrar Entrada</button>
        </form>

        <?php

        // Inclua o arquivo que contém a classe Pessoa, se necessário
        include "../classes/pessoa.php";

        // Verifique se o formulário foi submetido e os campos não estão em branco
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pessoa"])){
            $pessoa = $_POST['pessoa'];

                    $sql = "INSERT INTO entrada (pessoa_id) VALUES ('$pessoa')";
                    
                    if ($conn->query($sql)) {
                        echo "<div class='alert alert-success mt-3'>Registro de entrada realizado com sucesso.</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Erro ao registrar entrada: " . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-warning mt-3'>Pessoa não cadastrada. Por favor, faça o cadastro antes de registrar a entrada.</div>";
                }
        ?>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#inputCPF').on('change', function() {
                var cpf = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'buscar_pessoa.php',
                    data: { cpf: cpf },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data) {
                            $('#formEntrada input[name="nome"]').val(data.nome);
                            $('#formEntrada input[name="data_nascimento"]').val(data.data_nascimento);
                            $('#formEntrada input[name="rg"]').val(data.rg);
                        } else {
                            alert('Pessoa não encontrada.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>