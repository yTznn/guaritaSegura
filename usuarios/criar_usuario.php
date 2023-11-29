<!DOCTYPE html>
<html>
<head>
    <title>Criar Usuário</title>
    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        body {
            margin-top: 60px; /* Para evitar que a navbar cubra o conteúdo */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    </nav>

    <div class="container">
        <h1 class="mt-4 mb-4">Criar Novo Usuário</h1>

        <form method="post" action="processar_criacao_usuario.php">
            <div class="form-group">
                <label for="username">Nome de Usuário:</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="form-group">
                <label for="role">Papel:</label>
                <select class="form-control" name="role">
                    <option value="3">Administrador</option>
                    <option value="4">Porteiro</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Criar Usuário</button>
        </form>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>