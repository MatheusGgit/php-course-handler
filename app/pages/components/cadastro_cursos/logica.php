<?php
if (isset($_POST['submit'])) {
    try {
        //require_once dirname(__FILE__ . '/controller/cadastro.controller.php', 2);
        $CursoDAO->INSERT($_POST['nome'], $_POST['link'], 1);
        echo 'Sucesso';
    } catch (Throwable $th) {
        //echo ShowBootstrapAlert('danger', $th->getMessage());
        echo 'Falha: '.$th->getMessage();
    }
}
