<?php
$db = new SQLite3(__DIR__ . '/../sales.db');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "POST";
} else {
    echo "Método inválido.";
}
?>
