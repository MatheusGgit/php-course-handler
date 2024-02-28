<?php require 'pages/components/header_php.php'; ?>
<?php $ROOT_PATH = dirname(__DIR__ . '/app'); ?>
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
    <?php require_once 'pages/components/header.php'; ?>
    <div class="p-3">
        <?php $path = 'pages/' . $_GET['Page'] . '.php';
        try {
            if (!isset($_GET['Page'])) {
                header('Location: index.php?Page=dashboard');
            }

            if (file_exists($path)) {
                require_once 'pages/' . $_GET['Page'] . '.php';
            }
        } catch (Throwable $th) {
            require 'pages/error_page.php';
        }
        ?>
    </div>
</body>

</html>