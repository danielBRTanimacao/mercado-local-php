<?php 
    # Primeiro indice e o valor para o dia atual o segundo e o dia anterior, vale o mesmo para mes e semana
    # Exemplo [10, 2]
    # O indice 0 da lista onde o valor é 10 vai ser o hoje o indice 1 no qual o valor é 2 representa o dia anterior.

    $db = new SQLite3(__DIR__ . '/../sales.db');

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        # Essa primeira parte coleta apenas as vendas e guarda no cache
        # exemplo eu preciso pegar o dia de hj "Domingo"..
        # conforme vou adicionando vendas no create
        # ele vai adicionando as vendas de hj no cache o cache vai conter 3 setores
        # Hj, Mes e a semana
        
        $week = (
            [
                "domingo" => 2,
                "segunda" => 23,
                "terca" => 12,
                "quarta" => 54,
                "quinta" => 32,
                "sexta" => 12,
                "sabado" => 8,
            ]
        );
        $beforeMonth = $week["domingo"] + $week["segunda"] + $week["terca"] + $week["quarta"] + $week["quinta"] + $week["sexta"] + $week["sabado"];
        echo json_encode(
            [
                "week" => [$week["domingo"], $week["segunda"], $week["terca"], $week["quarta"], $week["quinta"], $week["sexta"], $week["sabado"]], 
                "day" => [$week["sabado"], $week["sexta"]], 
                "month" => [$beforeMonth, $beforeMonth / 2]
            ]
        );
    } else {
        echo json_encode(["negado" => "Acesso negado!"]);
    }
?>