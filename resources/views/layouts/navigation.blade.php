<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">SisRelatorioUAB</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Relatórios</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Meus Relatórios:</h6>
                <a class="collapse-item" href="{{ route('novo.relatorio') }}">Novo</a>
                <a class="collapse-item" href="{{ route('relatorio.vinculo') }}">Listar todos</a>
            </div>
        </div>
    </li>
    @role('Coordenador|Administrador')
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Área Coordenador</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Meus Relatórios:</h6>
                <a class="collapse-item" href="{{ route('novo.relatorio') }}">Realizar Relatório</a>
                <a class="collapse-item" href="{{ route('relatorio.vinculo') }}">Listar todos</a>
                <h6 class="collapse-header">Bolsistas:</h6>
                <a class="collapse-item" href="{{ route('bolsistas') }}">Relatório Bolsistas</a>
                <a class="collapse-item" href="{{ route('mensal.relatorios') }}">Relatórios Mensal</a>
                <a class="collapse-item" href="#">Validar Relatório</a>
            </div>
        </div>
    </li>
    @endrole
    @role('Administrador')
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrativo
    </div>

     <!-- Nav Item - Vinculações -->
     <li class="nav-item" >
        <a class="nav-link" href="{{ route('usuarios') }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Usuários</span>
        </a>
    </li>

     <!-- Nav Item - Cursos -->
    <li class="nav-item" >
        <a class="nav-link" href="{{ route('cursos') }}">
            <i class="fas fa-fw fa-th-list"></i>
            <span>Cursos</span></a>
    </li>

    <!-- Nav Item - Funções -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('funcoes') }}">
            <i class="fas fa-fw fa-cubes"></i>
            <span>Funções</span></a>
    </li>

    <!-- Nav Item - Polos -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('polos') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Polos</span></a>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermissoes"
            aria-expanded="true" aria-controls="collapsePermissoes">
            <i class="fas fa-fw fa-exclamation-circle"></i>
            <span>Controle de Acesso</span>
        </a>
        <div id="collapsePermissoes" class="collapse" aria-labelledby="collapsePermissoes"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('roles.index') }}">Papéis</a>
                <a class="collapse-item" href="{{ route('permissoes.index') }}">Permissões</a>      
            </div>
        </div>
    </li>
    @endrole


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    </ul>
    <!-- End of Sidebar -->
</nav>
