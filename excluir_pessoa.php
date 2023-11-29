<?php
include "config/db_config.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pessoa WHERE id_pessoa = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>Usuário excluído com sucesso!</div>";
        echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 1000);</script>";
    } else {
        echo "Erro ao excluir usuário: " . $conn->error;
    }
} else {
    echo "ID de pessoa não fornecido.";
}
?>