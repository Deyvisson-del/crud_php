<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "root";
    private $banco = "bd_cadastro";
    private $conexao;

    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_errno) {
            die("Falha na conexão: " . $this->conexao->connect_error);
        }
        
        // Define o charset para utf8
        $this->conexao->set_charset("utf8mb4");
    }

    public function getConexao() {
        return $this->conexao;
    }

    public function fecharConexao() {
        $this->conexao->close();
    }
}

// Uso básico:
// $db = new Database();
// $conexao = $db->getConexao();
// ... operações com o banco ...
// $db->fecharConexao();
?>