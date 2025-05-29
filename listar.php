<?php
require_once 'config.php';

if (!isset($_SESSION['pessoas']) || count($_SESSION['pessoas']) === 0) {
    echo "<p>Nenhuma pessoa cadastrada ainda.</p>";
    return;
}

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Nome</th><th>Idade</th><th>Email</th><th>Telefone</th></tr>";

foreach ($_SESSION['pessoas'] as $pessoa) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($pessoa['nome']) . "</td>";
    echo "<td>" . htmlspecialchars($pessoa['idade']) . "</td>";
    echo "<td>" . htmlspecialchars($pessoa['email']) . "</td>";
    echo "<td>" . htmlspecialchars($pessoa['telefone']) . "</td>";
    echo "</tr>";
}

echo "</table>";
