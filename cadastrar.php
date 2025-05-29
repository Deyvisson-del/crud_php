<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $idade = trim($_POST['idade'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if (empty($nome) || empty($idade) || empty($email) || empty($telefone)) {
        echo "Por favor, preencha todos os campos!";
        exit;
    }

    $pessoa = [
        'nome' => htmlspecialchars($nome),
        'idade' => (int)$idade,
        'email' => htmlspecialchars($email),
        'telefone' => htmlspecialchars($telefone)
    ];

    $_SESSION['pessoas'][] = $pessoa;

    echo "Pessoa cadastrada com sucesso!";
} else {
    echo "Requisição inválida.";
}
