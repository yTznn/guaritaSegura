<?php
// Inclua o arquivo de configuração do banco de dados
include "../config/db_config.php";

// Verifique se o CPF foi recebido por POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cpf"])) {
    $cpf = $_POST["cpf"];

    // Consulta para buscar os dados da pessoa pelo CPF
    $sql = "SELECT nome, data_nascimento, rg FROM pessoa WHERE cpf = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Se a pessoa for encontrada, retorne os dados no formato JSON
        $row = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($row);
        exit();
    } else {
        // Se a pessoa não for encontrada, retorne uma mensagem de erro no formato JSON
        header('Content-Type: application/json');
        echo json_encode(array("error" => "Pessoa não encontrada"));
        exit();
    }
} else {
    // Se o CPF não foi recebido, retorne uma mensagem de erro no formato JSON
    header('Content-Type: application/json');
    echo json_encode(array("error" => "CPF não fornecido"));
    exit();
}
?>