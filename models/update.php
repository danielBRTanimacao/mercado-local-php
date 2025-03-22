<?php
    $db = new SQLite3(__DIR__ . '/../sales.db'); # Abre o arquivo sales.db

    # Permite apenas a requisição POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = intval($_POST['id']);

        $query = $db->prepare("SELECT * FROM sales WHERE id = :id");
        $query->bindValue(':id', $id, SQLITE3_INTEGER); # Coleta o id do produto enviado
        $result = $query->execute();
        $current_data = $result->fetchArray(SQLITE3_ASSOC);

        # Validação na entrada de valores query
        if ($current_data) {
            $name = !empty($_POST['name']) ? trim($_POST['name']) : $current_data['name'];
            $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : $current_data['quantity'];
            $price = isset($_POST['price']) ? floatval(str_replace(',', '.', $_POST['price'])) : $current_data['price'];
            $kiloGram = isset($_POST['kiloGram']) ? floatval(str_replace(',', '.', $_POST['kiloGram'])) : $current_data['kiloGram'];

            $stmt = $db->prepare("UPDATE sales SET name = :name, quantity = :quantity, price = :price, kiloGram = :kiloGram WHERE id = :id");
            $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
            $stmt->bindValue(':name', $name, SQLITE3_TEXT);
            $stmt->bindValue(':quantity', $quantity, SQLITE3_INTEGER);
            $stmt->bindValue(':price', $price, SQLITE3_FLOAT);
            $stmt->bindValue(':kiloGram', $kiloGram, SQLITE3_FLOAT);

            if ($stmt->execute()) {
                header("Location: /public/index.php");
                exit();
            } else {
                echo json_encode(["error" => "Erro ao atualizar o produto."]);
            }
        } else {
            echo json_encode(["notFound" => "Produto não encontrado."]);
        }
    } else {
        echo json_encode(["error" => "Método inválido."]);
    }
?>
