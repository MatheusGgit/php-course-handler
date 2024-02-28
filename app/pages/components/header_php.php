<?php
global $ROOT_PATH;
require_once 'classes/connection.php';
require_once 'controllers/index.controller.php';
require_once '../vendor/autoload.php';
require 'controllers/daos/usuarios.dao.php';
require 'controllers/daos/cursos.dao.php';

$Connection = new DBConnection;
$IndexController = new IndexController;
$UsuarioDAO = new UsuarioDAO;
$CursoDAO = new CursoDAO;

$array_usuarios = $UsuarioDAO->SELECT_ALL();

try {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 4));
    $dotenv->load();
} catch (Throwable $th) {
    echo '<div class="alert alert-danger" role="alert">Erro no ENV: ' . $th . '</div>';
}