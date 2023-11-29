<!DOCTYPE html>
<html>
<head>
    <title>Realizar Saída de Pessoas</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Adiciona margem à direita do nome */
        .person-name {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Página Inicial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../login/logout.php">Sair do Sistema</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">Realizar Saída de Pessoas</h1>

        <?php
        include "../config/db_config.php";

        if(isset($_POST['realizarSaida'])) {
            $userId = $_POST['realizarSaida'];
            $date = date("Y-m-d H:i:s"); // Obtém a data atual

            $sql = "UPDATE entrada SET data_saida = '$date' WHERE id_entrada = $userId";

            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>Saída registrada com sucesso para o usuário ID: $userId</div>";
            } else {
                echo "Erro ao registrar saída: " . $conn->error;
            }
        }

        $sql = "SELECT b.nome, a.id_entrada FROM entrada a JOIN pessoa b ON a.pessoa_id = b.id_pessoa WHERE data_saida IS NULL";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<form action='realizar_saida.php' method='post'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='form-group d-flex align-items-center mb-2'>";
                echo "<span class='person-name'>" . $row["nome"] . "</span>";
                echo "<button type='submit' class='btn btn-primary' name='realizarSaida' value='" . $row["id_entrada"] . "'>Realizar Saída</button>";
                echo "</div>";
            }
            echo "</form>";
        } else {
            echo "Nenhuma pessoa encontrada sem saída realizada.";
        }
        ?>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>