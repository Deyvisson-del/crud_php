<?php
require_once 'config.php';


// Suas operações com o banco aqui

$database->fecharConexao();

$_SESSION['pessoas'] = [];

echo "Todos os cadastros foram removidos com sucesso!";
 