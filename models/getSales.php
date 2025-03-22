<?php 
    $db = new SQLite3(__DIR__ . '/../sales.db');
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo json_encode(["data" => [23, 12, 54, 24, 15, 10, 1]]);
    } else {
        echo json_encode(["negado" => "Acesso negado!"]);
    }
?>