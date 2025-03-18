<?php
    class modelSales {
        private $db = new SQLite3(__DIR__ . '/../sales.db');

        public function __construct() {
            $this->db;
        }

        public function getAllData() {
            return $this->db->query("SELECT * FROM sales");
        }
    }
?>