<?php 
    # Primeiro indice e o valor atual o segundo e o anterior
    # Exemplo [10, 2]
    # O indice 0 da lista onde o valor é 10 vai ser o hoje o indice 1 no qual o valor é 2 representa o dia anterior.

    $db = new SQLite3(__DIR__ . '/../sales.db');
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo json_encode(
            [
                "week" => [23, 12, 54, 24, 15, 10, 1], 
                "day" => [10, 1], 
                "month" => [105, 53]
            ]
        );
    } else {
        echo json_encode(["negado" => "Acesso negado!"]);
    }
?>