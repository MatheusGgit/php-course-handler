<?php
require_once 'classes/connection.php';
require_once 'controllers/index.controller.php';
require_once '../vendor/autoload.php';

$Connection = new DBConnection;
$IndexController = new IndexController;


try {
    $path = dirname(__FILE__, 4);
    $dotenv = Dotenv\Dotenv::createImmutable($path);
    $dotenv->load();
} catch (Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">Erro no ENV: ' . $th . '</div>';
}

require 'controllers/daos/usuarios.dao.php';
$UsuarioDAO = new UsuarioDAO;
$array_usuarios = $UsuarioDAO->SELECT_ALL();