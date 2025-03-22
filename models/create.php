<?php
    $db = new SQLite3(__DIR__ . '/../sales.db');

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST['name'] ?? '';
        $quantity = $_POST['quantity'] ?? '';
        $brand = $_POST['brand'] ?? null;
        $kiloGram = $_POST['kiloGram'] ?? '';
        $price = $_POST['price'] ?? '';

        if (empty($name) || empty($quantity) || empty($kiloGram) || empty($price)) {
            die("Erro: Todos os campos obrigatórios devem ser preenchidos.");
        }

        $stmt = $db->prepare("INSERT INTO sales (name, quantity, brand, kiloGram, price, dateBuy) VALUES (:name, :quantity, :brand, :kiloGram, :price, datetime('now'))");
        
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':quantity', $quantity, SQLITE3_INTEGER);
        $stmt->bindValue(':brand', $brand, SQLITE3_TEXT);
        $stmt->bindValue(':kiloGram', $kiloGram, SQLITE3_FLOAT);
        $stmt->bindValue(':price', $price, SQLITE3_FLOAT);

        if ($stmt->execute()) {
            echo json_encode(["sucesso" => "Venda adicionada com sucesso!"]);
            header("Location: /public/index.php");
            exit;
        } else {
            echo json_encode(["erro" => "Erro ao adicionar venda."]);
        }
    } else {
        echo json_encode(["invalido" => "Método inválido."]);
    }
?>
