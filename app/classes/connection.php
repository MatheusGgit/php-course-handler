<?php
class DBConnection {
    public function __construct()
    {
        $db_path = __DIR__ . '/../database/banco_de_dados.db';
        global $PDO;
        $PDO = new PDO("sqlite:{$db_path}");
    }
}