<?php
class Pessoa {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function inserirPessoa($nome, $data_nascimento, $cpf, $rg) {
        $sql = "INSERT INTO pessoa (nome, data_nascimento, cpf, rg) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $data_nascimento, $cpf, $rg);
        return $stmt->execute();
    }

    public function buscarPessoaPorId($id) {
        $sql = "SELECT * FROM pessoa WHERE id_pessoa = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function atualizarPessoa($id, $nome, $data_nascimento, $cpf, $rg) {
        $sql = "UPDATE pessoa SET nome=?, data_nascimento=?, cpf=?, rg=? WHERE id_pessoa=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $nome, $data_nascimento, $cpf, $rg, $id);
        return $stmt->execute();
    }

    public function deletarPessoa($id) {
        $sql = "DELETE FROM pessoa WHERE id_pessoa=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function listarTodasPessoas() {
        $sql = "SELECT id_pessoa, nome, data_nascimento, cpf, rg FROM pessoa";
        $result = $this->conn->query($sql);

        if ($result) {
            $pessoas = array();

            while ($row = $result->fetch_assoc()) {
                $pessoas[] = $row;
            }

            return $pessoas;
        } else {
            return false;
        }
    }
}
?>