<?php
    $dbname = __DIR__ . "/../sales.db";
    $conn = new SQLite3($dbname);

    $sql = "CREATE TABLE IF NOT EXISTS sales (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        quantity INTEGER NOT NULL,
        brand TEXT,
        name TEXT NOT NULL,
        kiloGram REAL NOT NULL,
        price REAL NOT NULL,
        dateBuy TEXT DEFAULT (datetime('now', 'localtime'))
    )";
    $conn->exec($sql);
?>