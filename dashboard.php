<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Colaboradores Pendentes</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos adicionais (opcional) */
        body {
            margin: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <form method="post" action="">
                        <input type="submit" name="logout" value="Sair do Sistema" class="btn btn-secondary mt-2 mt-lg-0 ml-lg-2">
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center">Pessoas com entrada pendente de saída</h1>

        <div class="mt-4">
            <?php
            include "config/db_config.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["logout"])) {
                session_start();
                $_SESSION = array();
                session_destroy();
                header("Location: login/login.php");
                exit();
            }

            $sql = "SELECT pessoa.nome
                    FROM pessoa
                    INNER JOIN registro ON pessoa.id_pessoa = registro.pessoas_id_pessoa
                    WHERE registro.data_saida IS NULL";

            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                echo "<h2>Pessoas com entrada pendente de saída:</h2>";
                echo "<ul class='list-group'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>" . $row['nome'] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Pessoas com entrada pendente de saída.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>