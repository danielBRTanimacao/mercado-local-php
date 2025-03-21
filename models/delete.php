<?php
    $db = new SQLite3(__DIR__ . '/../sales.db');

    if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
        $path = explode("/", $_SERVER["REQUEST_URI"]);
        $id = end($path);

        if (!is_numeric($id)) {
            http_response_code(400);
            echo json_encode(["error" => "ID inválido"]);
            exit;
        }

        $stmt = $db->prepare("DELETE FROM sales WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Venda deletada com sucesso!"]);
        } else {
            http_response_code(500);
            echo json_encode(["error" => "Erro ao deletar a venda"]);
        }
    } else {
        http_response_code(405);
        echo json_encode(["error" => "Método não permitido"]);
    }
?>
