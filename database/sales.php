<?php
    # conectandon ao banco de dados e criando banco de dados na raiz do projeto
    $dbname = __DIR__ . "/../sales.db";
    $conn = new SQLite3($dbname);

    # Tabela simples 
    $sql = "CREATE TABLE IF NOT EXISTS sales (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        quantity INTEGER NOT NULL,
        brand TEXT,
        name TEXT NOT NULL,
        kiloGram REAL NOT NULL,
        price REAL NOT NULL,
        dateBuy TEXT DEFAULT (datetime('now', 'localtime'))
    )";
    
    # Executa a query db
    $conn->exec($sql);
?>