<?php
// require_once 'config.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $nome = trim($_POST['nome'] ?? '');
//     $idade = trim($_POST['idade'] ?? '');
//     $email = trim($_POST['email'] ?? '');
//     $telefone = trim($_POST['telefone'] ?? '');

//     if (empty($nome) || empty($idade) || empty($email) || empty($telefone)) {
//         echo "Por favor, preencha todos os campos!";
//         exit;
//     }

//     $pessoa = [
//         'nome' => htmlspecialchars($nome),
//         'idade' => (int)$idade,
//         'email' => htmlspecialchars($email),
//         'telefone' => htmlspecialchars($telefone)
//     ];

//     // Adiciona à sessão
//     $_SESSION['pessoas'][] = $pessoa;

//     echo "Pessoa cadastrada com sucesso!";
// } else {
//     echo "Requisição inválida.";
// }

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cria instância do banco de dados
    $database = new Database();
    $conexao = $database->getConexao();

    // Prepara os dados (com segurança)
    $nome = $conexao->real_escape_string($_POST['nome'] ?? '');
    $idade = intval($_POST['idade'] ?? 0);
    $email = $conexao->real_escape_string($_POST['email'] ?? '');
    $telefone = $conexao->real_escape_string($_POST['telefone'] ?? '');

    // Validação básica
    if (empty($nome) || empty($email) || $idade <= 0) {
        die("Por favor, preencha todos os campos corretamente.");
    }

    // Prepara a query com parâmetros (mais seguro que concatenar)
    $stmt = $conexao->prepare("INSERT INTO tb_usuarios (nome, idade, email, telefone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $nome, $idade, $email, $telefone);

    // Executa e verifica
    if ($stmt->execute()) {
        echo "Registro criado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fecha a conexão
    $stmt->close();
    $database->fecharConexao();
}
?>