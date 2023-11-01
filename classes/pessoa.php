<?php
class Pessoa {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrarPessoa($nome, $data_nascimento, $cpf, $rg) {
        // Monta a consulta SQL para inserir uma nova pessoa
        $sql = "INSERT INTO pessoa (nome, data_nascimento, cpf, rg) VALUES (?, ?, ?, ?)";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            // Se a preparação falhar, você pode lidar com o erro aqui
            return false;
        }

        // Vincula os parâmetros da consulta SQL aos valores fornecidos
        $stmt->bind_param("ssss", $nome, $data_nascimento, $cpf, $rg);

        // Executa a consulta
        if ($stmt->execute()) {
            // Retorna true se o cadastro for bem-sucedido
            return true;
        } else {
            // Retorna false em caso de erro
            return false;
        }
    }

    public function listarTodasPessoas() {
        // Consulta SQL para selecionar todas as pessoas
        $sql = "SELECT id_pessoa, nome, data_nascimento, cpf, rg FROM pessoa";

        // Executa a consulta
        $result = $this->conn->query($sql);

        if ($result) {
            // Retorna os resultados como um array
            $pessoas = array();

            while ($row = $result->fetch_assoc()) {
                $pessoas[] = $row;
            }

            return $pessoas;
        } else {
            // Retorna false em caso de erro
            return false;
        }
    }
}
?>