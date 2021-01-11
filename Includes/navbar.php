<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <br>
    <div class="sidebar-brand-text mx-3">PAINEL NOVUS</div>
    <br>
  </a>
  <hr class="sidebar-divider my-0">
  <hr class="sidebar-divider">
  <div class="sidebar-heading" align="center">
    Novo Cadastro
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>CADASTRO</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="IntCadUsuario.php">Cadastro de Usuário</a>
        <a class="collapse-item" href="IntCadSala.php?acao=cadastrar">Cadastro de Salas</a>
        <a class="collapse-item" href="IntCadUsuarioSala.php?acao=cadastrar">Reserva de Sala</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading" align="center">
    Verificar Registros
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-book-open"></i>
      <span>CONSULTA</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="IntConsUsuario.php">Consultar Usuários</a>
        <a class="collapse-item" href="IntConsSala.php">Consultar Salas</a>
        <a class="collapse-item" href="IntConsUsuarioSala.php">Consultar Reservas</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider">  
  <li class="nav-item">
    <a class="nav-link" href="Dashboard.php">
      <i class="fas fa-chart-line"></i>
      <span>DASHBOARD</span></a>
  </li>
</ul>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="../controle/ControleAcesso.php?op=deslogar" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOGOUT</span>
          </a>
        </li>
      </ul>
    </nav>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>