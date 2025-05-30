<?php
require_once 'config.php';


// Suas operações com o banco aqui

$database->fecharConexao();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Lista de Pessoas</h2>

    <div id="listaPessoas"><?php include 'listar.php'; ?></div>
    <br>
    <button class="consultar" type="button"><a href="index.php">Voltar</a></button>
</body>

</html>