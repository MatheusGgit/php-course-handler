<?php
if (isset($_POST['submit'])) {
    try {
        $CursoDAO->INSERT($_POST['nome'], $_POST['link'], 1);
        echo 'Sucesso';
    } catch (Throwable $th) {
    }
}
