<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Link</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $cursos = $CursoDAO->SELECT_ALL()?>
            <?php foreach ($cursos as $curso) :?>
            <tr>
                <td><?= $curso['nome'] ?></td>
                <td><?= $curso['link'] ?></td>
                <td><a href="<?= $curso['link'] ?>" class="btn btn-primary">Acessar</a></td>
            </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>