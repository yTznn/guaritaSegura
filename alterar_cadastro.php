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
        <h1 class="text-center">Selecione a pessoa para alterar o cadastro</h1>

        <?php
        include "config/db_config.php";

        $sql = "SELECT * FROM pessoa";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<form action='alterar_cadastro_pessoa.php' method='get'>";
            echo "<div class='form-group'>";
            echo "<label for='selectPerson'>Selecione a pessoa para editar:</label>";
            echo "<select id='selectPerson' name='id' class='form-control'>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id_pessoa"] . "'>" . $row["nome"] . "</option>";
            }

            echo "</select>";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Editar</button>";
            echo "</form>";
        } else {
            echo "Nenhuma pessoa encontrada.";
        }
        ?>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>