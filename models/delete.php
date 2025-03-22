<?php
    # Buscando banco de dados raiz do projeto
    $db = new SQLite3(__DIR__ . '/../sales.db');

    if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
        $path = explode("/", $_SERVER["REQUEST_URI"]); # Coleta o id final na url public/delete.php/{id}
        $id = end($path);

        if (!is_numeric($id)) { # Verifica se e númerico 
            http_response_code(400);
            echo json_encode(["error" => "ID inválido"]);
            exit;
        }

        # Prepara e elimina o produto pelo ID
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
