<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">Gerenciamento de Cursos</span>
    </a>

    <ul class="nav nav-pills">
        <li class="nav-item"><a href="?Page=dashboard" class="nav-link <?= isset($_GET['Page']) && $_GET['Page'] == 'dashboard' ? 'active' : '' ?>" aria-current="page">Painel</a></li>
        <li class="nav-item"><a href="?Page=cadastrar.curso" class="nav-link <?= isset($_GET['Page']) && $_GET['Page'] == 'cadastrar.curso' ? 'active' : '' ?>">Adicionar Curso</a></li>
        <li class="nav-item"><a href="?Page=logout" class="nav-link <?= isset($_GET['Page']) && $_GET['Page'] == 'logout' ? 'active' : '' ?>">Sair</a></li>
    </ul>
</header>