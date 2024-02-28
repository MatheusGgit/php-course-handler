<?php
try {
    global $ROOT_PATH;
    require_once $ROOT_PATH.'/controllers/daos/cursos.dao.php';
    $CursoDAO = new CursoDAO;

    require_once 'components/cadastro_cursos/logica.php';
} catch (Throwable $th) {
    echo $th;
}

?>
<div class="col-lg-12 p-4">
    <form action="?Page=cadastrar" method="POST" class="row g-3">
        <div class="col-12">
            <label>Nome</label>
            <input class="form-control" id="nome" name="nome">
        </div>
        <div class="col-12">
            <label>Link</label>
            <input class="form-control" id="link" name="link">
        </div>
        <div class="d-flex align-items-center">
            <button type="submit" id="submit" name="submit" class="btn btn-primary">Cadastrar</button>
            <a href="?Page=dashboard" class="btn btn-secondary mx-2">Cancelar</a>
        </div>
    </form>
</div>