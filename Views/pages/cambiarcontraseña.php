<?php include '../includes/header.php'; ?>
<?php 
/**
  * Author:
  * Ing Alberto Rodriguez
*
**/
require_once('../../Controllers/HomeController.php');
$HomeController = new HomeController();

require '../../Lib/FlashMessages.php';
if (!session_id()) @session_start();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
date_default_timezone_set('America/Bogota');

if (isset($_GET['IdServicio'])) {
  $IdServicio = $_GET['IdServicio'];
  $data = $HomeController->VerOta_Informe_Traslado($IdServicio);
}else{
  $IdServicio = $HomeController->MaximoOta_Informe_Traslado()->__GET('IdServicio')+1;
  $data = NULL;
}
?>
<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa fa-plus-square"></i>
      </div>
      <div class="sidebar-brand-text mx-3">TRASLADOS <sup class="fa fa-car"></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Items -->
    <li class="nav-item active">
      <a class="nav-link" href="index.php"><i class="fas fa-fw fa-file"></i><span>NUEVO</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
      <a class="nav-link" href="buscar.php"><i class="fas fa-fw fa-search"></i><span>BUSCAR</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
      <p style="margin: 0"><strong>Copyright © 2020-2021</strong></p><p style="margin: 0">All rights reserved.</p>
      <span class="fa fa-file-code"></span>
      <br>Version 1.0
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>

        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <h2> Cambiar Contraseña</h2>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false"><i class="fas fa-search fa-fw"></i></a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
          <!-- Nav Item - Alerts -->
          
          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Ape1').' '.$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Ape2').' '.$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Nom1').' '.$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Nom2') ?></span><img class="img-profile rounded-circle"src="../Resource/img/undraw_profile.svg"></a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="../../Actions/Login/logout.php" ><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesion</a>
                        </div>
                    </li>

        </ul>
      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <form action="../../Actions/Usuarios/crearusuario.php" method="POST" enctype="multipart/form-data">
          
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#crearusuario" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="DatosPaciente">
              <h6 class="m-0 font-weight-bold text-primary">INFORMACION PARA CAMBIAR CONTRASEÑA</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="crearusuario">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-4 mb-4">
                    <label>Contraseña Anterior</label>
                    <input type="text" class="form-control" id="" name="Registro" required>
                  </div>
                  <div class="col-sm-4 mb-4">
                    <label>Nueva Contraseña</label>
                    <input type="text" class="form-control" id="" name="Usuario" required>
                  </div>
                  <div class="col-sm-4 mb-4">
                    <label>Corfirmar Contraseña</label>
                    <input type="text" class="form-control" id="" name="Clave" required>
                  </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-primary btn-block">CAMBIAR CONTRASEÑA</button>
          <hr>
              </div>
            </div>
          </div>
</form>
    
<?php include '../includes/footer.php'; ?>