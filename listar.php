<?php
require_once 'config.php';

$modoEdicao = isset($_GET['editar']) && $_GET['editar'] == '1';

if (!isset($_SESSION['pessoas']) || count($_SESSION['pessoas']) === 0) {
    echo "<p>Nenhuma pessoa cadastrada ainda.</p>";
    return;
}

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Nome</th><th>Idade</th><th>Email</th><th>Telefone</th>";

if ($modoEdicao) {
    echo "<th>Ações</th>";
}

echo "</tr>";

foreach ($_SESSION['pessoas'] as $index => $pessoa) {
    echo "<tr>";

    if ($modoEdicao) {
        echo "<td><input type='text' id='nome_$index' value='" . htmlspecialchars($pessoa['nome']) . "'></td>";
        echo "<td><input type='number' id='idade_$index' value='" . htmlspecialchars($pessoa['idade']) . "'></td>";
        echo "<td><input type='email' id='email_$index' value='" . htmlspecialchars($pessoa['email']) . "'></td>";
        echo "<td><input type='text' id='telefone_$index' value='" . htmlspecialchars($pessoa['telefone']) . "'></td>";
        echo "<td><button onclick='salvarEdicao($index)'>Salvar</button></td>";
    } else {
        echo "<td>" . htmlspecialchars($pessoa['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($pessoa['idade']) . "</td>";
        echo "<td>" . htmlspecialchars($pessoa['email']) . "</td>";
        echo "<td>" . htmlspecialchars($pessoa['telefone']) . "</td>";
    }

    echo "</tr>";
}

echo "</table>";
