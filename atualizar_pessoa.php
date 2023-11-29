<?php
include "config/db_config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $newName = $_POST['nome'];
        // Receba outros campos do formulário e armazene-os em variáveis

        $sql = "UPDATE pessoa SET nome='$newName' WHERE id_pessoa=$id";
        // Adicione as atualizações para os outros campos conforme necessário

        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success mt-3" role="alert">';
            echo 'Dados atualizados com sucesso!<br> Você será redirecionado para a página principal do sistema!';
            echo '</div>';
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">';
            echo 'Erro ao atualizar os dados: ' . $conn->error;
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-warning mt-3" role="alert">';
        echo 'ID de pessoa não fornecido.';
        echo '</div>';
    }
}
?>