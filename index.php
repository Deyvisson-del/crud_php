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
    <link rel="stylesheet" href="style.css">
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

        <button class="cadastrar" type="button" onclick="cadastrarPessoa()">Cadastrar</button>
        <button class="consultar" type="button"><a href="pag2.php">Consultar</a></button>
        <button class="limpar" type="button" onclick="limparCadastro()">Limpar Tudo</button>

    </form>

    <div id="resultado"></div>
    <div id="listaPessoas"></div>

    <script src="main.js"></script>
</body>

</html>