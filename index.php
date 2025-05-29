<?php
require_once 'config.php';


if (!isset($_SESSION['pessoas'])) {
    $_SESSION['pessoas'] = [];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoas</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; margin-right: 10px; }
        button:hover { background: #218838; }
        #resultado { margin-top: 15px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f8f9fa; }
    </style>
</head>
<body>

    <h1>Cadastro de Pessoas</h1>

    <form id="formCadastro">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
        </div>

        <button type="button" onclick="cadastrarPessoa()">Cadastrar</button>
        <button type="button" onclick="limparCadastro()">Limpar Tudo</button>
    </form>

    <div id="resultado"></div>

    <h2>Lista de Pessoas</h2>
    <div id="listaPessoas"><?php include 'listar.php'; ?></div>

    <script src="main.js"></script>
</body>
</html>
