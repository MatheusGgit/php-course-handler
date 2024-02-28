<?php
 require_once 'controllers/index.controller.php'; ?>
<?php $IndexController = new IndexController; ?>
<?php require_once '../vendor/autoload.php'; ?>
<?php require_once 'classes/connection.php';?>
<?php $Connection = new DBConnection?>
<?php
try {
    $path = dirname(__FILE__, 2);
    $dotenv = Dotenv\Dotenv::createImmutable($path);
    $dotenv->load();
} catch (Throwable $th) { ?>
    <div class="alert alert-danger" role="alert"><?= 'Erro no ENV: ' . $th ?></div>
<?php } ?>

<?php 
if (isset($_GET['Cadastro_curso'])) {
require 'controllers/daos/cadastro_cliente.dao.php';
$ClienteDAO = new ClienteDAO;
if ($ClienteDAO->INSERT('teste', 'teste')){
    echo 'inseriu';
}
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Centro de Cursos</title>
</head>

<body>
    <?php
    require_once 'pages/components/header.php';
    $path = 'pages/' . $_GET['Page'] . '.php';
    try {
        if (!isset($_GET['Page'])) {
            header('Location: index.php?Page=dashboard');
        }

        if (file_exists($path)) {
            require_once 'pages/' . $_GET['Page'] . '.php';
        }
    } catch (Throwable $th) {
    }
    ?>
</body>

</html>