<?php include '../includes/header.php'; ?>
<?php 
/**
  * Author:
  * Ing Joiner Escorcia Y Juan Gomez
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
                    <h2>Informe de Traslado</h2>
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
                            <a class="dropdown-item" href="cambiarcontraseña.php"><i class="fas fa-solid fa-unlock fa-fw mr-2 text-gray-400"></i>Cambiar contraseña</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="crearusuario.php"><i class="fas fa-solid fa-user-plus fa-fw mr-2 text-gray-400"></i>Crear Usuario</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../Actions/Login/logout.php" ><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesion</a>
                        </div>
                    </li>
        </ul>
      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <?php $msg->display() ?>
        <form action="<?php if ($data != NULL) { echo '../../Actions/Traslados/ModificarTraslados.php';}else{echo '../../Actions/Traslados/AgregarTraslados.php';} ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group row">
            <!-- <div class="col-sm-8"></div> -->
            <label class="col-sm-10 text-right">No Servicio</label>
            <div class="col-sm-2">
              <input type="text" class="form-control text-right" id="" name="IdServicio" value="<?= $IdServicio ?>" readonly>
            </div>
          </div>
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#DatosPaciente" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="DatosPaciente">
              <h6 class="m-0 font-weight-bold text-primary">INFORMACION GENERAL DEL PACIENTE</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="DatosPaciente">
              <div class="card-body">
                <div class="form-group row">
                <div class="col-sm-4 mb-3">
                  <label>Fecha Inicial</label>
                  <input type="date" class="form-control" id="" name="Fecha1" required value="<?php if($data != NULL) echo (new DateTime($data->__GET('Fecha1')))->format('Y-m-d'); else echo date('Y-m-d'); ?>">
                </div>
                <div class="col-sm-4 mb-3">
                  <label>Hora Inicial</label>
                  <input type="time" class="form-control" id="" name="Fecha1Hora" required value="<?php if($data != NULL) echo (new DateTime($data->__GET('Fecha1')))->format('H:i'); else echo date('H:i'); ?>">
                </div>
                <div class="col-sm-4 mb-3">
                  <label>Ficha</label>
                  <input type="text" class="form-control" id="" name="Ficha" value="<?php if($data != NULL && $data->__GET('Ficha') != NULL) echo $data->__GET('Ficha')?>">
                </div>
                        
                </div>

                <div class="form-group row">
                  <div class="col-sm-4 mb-3">
                    <label>Numero Doc</label>
                    <input type="text" class="form-control" id="Pte_NumDoc" onblur="buscar();" name="Pte_NumDoc" required value="<?php if($data != NULL) echo $data->__GET('Pte_NumDoc') ?>  ">
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>Tipo Doc</label>
                    <input type="text" class="form-control" id="" name="Pte_TipoDoc" style="text-transform:uppercase;" required value="<?php if($data != NULL) echo $data->__GET('Pte_TipoDoc') ?>">
                  </div>
                  <div class="col-sm-4 mb-3">
                    <label>Fecha Nac</label>
                    <input type="date" class="form-control" id="" name="Pte_FechaNac" value="<?php if($data != NULL && $data->__GET('Pte_FechaNac') != NULL) echo (new DateTime($data->__GET('Pte_FechaNac')))->format('Y-m-d') ?>">
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>Edad</label>
                    <input type="number" class="form-control" id="" name="Pte_Edad" value="<?php if($data != NULL) echo $data->__GET('Pte_Edad') ?>">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-4 mb-3">
                    <label>Entidad</label>
                    <input type="text" class="form-control"  name="Entidad" required value="<?php if($data != NULL) echo $data->__GET('Entidad') ?>  ">
                  </div>
                  <div class="col-sm-4 mb-3">
                    <label>Regimen</label>
                    <br>
                    <label ><input type="radio" class="" id="Pte_Regimen" name="Pte_Regimen" value="Subsidiado" <?php if($data != NULL && $data->__GET('Pte_Regimen') == "Subsidiado") echo "checked"; ?>> Subsidiado</label>
                    <br>
                    <label ><input type="radio" class="" id="Pte_Regimen" name="Pte_Regimen" value="Contributivo" <?php if($data != NULL && $data->__GET('Pte_Regimen') == "Contributivo") echo "checked"; ?>> Contributivo</label>  
                  </div>
                  <div class="col-sm-4 mb-3">
                    <label>Sexo</label>
                    <br>
                    <label class="col-sm-3"><input type="radio" class="" id="Pte_Sexo" name="Pte_Sexo" value="F" <?php if($data != NULL && $data->__GET('Pte_Sexo') == "F") echo "checked"; ?>> F</label>
                    <label class="col-sm-3"><input type="radio" class="" id="Pte_Sexo" name="Pte_Sexo" value="M" <?php if($data != NULL && $data->__GET('Pte_Sexo') == "M") echo "checked"; ?>> M</label>  
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2">Télefono</label>
                  <div class="col-sm-4 mb-3">
                    <input type="number" class="form-control" id="" name="Pte_Telefono"  value="<?php if($data != NULL) echo $data->__GET('Pte_Telefono') ?>">
                  </div>
                  <label class="col-sm-2">Dirección</label>
                  <div class="col-sm-4 mb-3">
                    <input type="text" class="form-control" id="" name="Pte_Direccion" value="<?php if($data != NULL) echo $data->__GET('Pte_Direccion') ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3 mb-3">
                    <label>Primer Apellido</label>
                    <input type="text" class="form-control" id="" name="Pte_Ap1" style="text-transform:uppercase;" required value="<?php if($data != NULL) echo $data->__GET('Pte_Ap1') ?>">
                  </div>
                  <div class="col-sm-3 mb-3">
                    <label>Segundo Apellido</label>
                    <input type="text" class="form-control" id="" name="Pte_Ap2" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('Pte_Ap2') ?>">
                  </div>
                  <div class="col-sm-3 mb-3">
                    <label>Primer Nombre</label>
                    <input type="text" class="form-control" id="" name="PteNom1" style="text-transform:uppercase;" required value="<?php if($data != NULL) echo $data->__GET('PteNom1') ?>">
                  </div>
                  <div class="col-sm-3 mb-3">
                    <label>Segundo Nombre</label>
                    <input type="text" class="form-control" id="" name="Pte_Nom2" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('Pte_Nom2') ?>">
                  </div>
                </div>
                <hr>
                <div class="form-group row">
                  <label class="col-sm-3">Nombres del Acompañante</label>
                  <div class="col-sm-3 mb-3">
                    <input type="text" class="form-control" id="" name="Aco_Nombres" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('Aco_Nombres') ?>">
                  </div>
                  <label class="col-sm-3">Apellidos del Acompañante</label>
                  <div class="col-sm-3 mb-3">
                    <input type="text" class="form-control" id="" name="Aco_Apellidos" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('Aco_Apellidos') ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3">No Documento</label>
                  <div class="col-sm-3 mb-3">
                    <input type="number" class="form-control" id="" name="Aco_Documento" value="<?php if($data != NULL) echo $data->__GET('Aco_Documento') ?>">
                  </div>
                  <label class="col-sm-3">Parentesco</label>
                  <div class="col-sm-3 mb-3">
                    <input type="text" class="form-control" id="" name="Aco_Perentezco" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('Aco_Perentezco') ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardServicio" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardServicio">
              <h6 class="m-0 font-weight-bold text-primary">SERVICIO</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardServicio">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-8 text-center">
                    <label>Desplazamientos</label>
                    <input type="text" class="form-control" id="" name="Sv_Origen" placeholder="Describa aqui..." value="<?php if($data != NULL) echo $data->__GET('Sv_Origen') ?>">
                    <input type="text" class="form-control" id="" name="Sv_Origen1" placeholder="Describa aqui..." value="<?php if($data != NULL) echo $data->__GET('Sv_Origen1') ?>">
                    <input type="text" class="form-control" id="" name="Sv_Origen2" placeholder="Describa aqui..." value="<?php if($data != NULL) echo $data->__GET('Sv_Origen2') ?>">
                    <input type="text" class="form-control" id="" name="Sv_Origen3" placeholder="Describa aqui..." value="<?php if($data != NULL) echo $data->__GET('Sv_Origen3') ?>">
                  </div>
                  <div class="col-sm-2 text-center">
                    <label>Llegada</label>
                    <input type="time" class="form-control" id="" name="Sv_Llegada" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Llegada')))->format('H:i') ?>">
                    <input type="time" class="form-control" id="" name="Sv_Llegada1" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Llegada1')))->format('H:i') ?>">
                    <input type="time" class="form-control" id="" name="Sv_Llegada2" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Llegada2')))->format('H:i') ?>">
                    <input type="time" class="form-control" id="" name="Sv_Llegada3" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Llegada3')))->format('H:i') ?>">
                  </div>
                  <div class="col-sm-2 text-center">
                    <label>Salida</label>
                    <input type="time" class="form-control" id="" name="Sv_Salida" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Salida')))->format('H:i') ?>">
                    <input type="time" class="form-control" id="" name="Sv_Salida1" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Salida1')))->format('H:i') ?>">
                    <input type="time" class="form-control" id="" name="Sv_Salida2" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Salida2')))->format('H:i') ?>">
                    <input type="time" class="form-control" id="" name="Sv_Salida3" value="<?php if($data != NULL) echo (new DateTime($data->__GET('Sv_Salida3')))->format('H:i') ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 col-md-12  col-lg-6 my-3 text-center">
                    <label>Complejidad</label>
                    <div class="col-sm-12">
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_Complejidad" name="Sv_Complejidad" value="Basico" <?php if($data != NULL && $data->__GET('Sv_Complejidad') == "BASICO") echo "checked"; ?>> Basico</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_Complejidad" name="Sv_Complejidad" value="Medicalizado" <?php if($data != NULL && $data->__GET('Sv_Complejidad') == "MEDICALIZADO") echo "checked"; ?>> Medicalizado</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_Complejidad" name="Sv_Complejidad" value="Neonatal" <?php if($data != NULL && $data->__GET('Sv_Complejidad') == "NEONATAL") echo "checked"; ?>> Neonatal</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_Complejidad" name="Sv_Complejidad" value="Otro" <?php if($data != NULL && $data->__GET('Sv_Complejidad') == "OTRO") echo "checked"; ?>> Otro</label>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-12  col-lg-6 my-3 text-center">
                    <label>Tipo Servicio</label>
                    <div class="col-sm-12">
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_TipoServicio" name="Sv_TipoServicio" value="Sencillo" <?php if($data != NULL && $data->__GET('Sv_TipoServicio') == "SENCILLO") echo "checked"; ?>> Sencillo</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_TipoServicio" name="Sv_TipoServicio" value="Viaje" <?php if($data != NULL && $data->__GET('Sv_TipoServicio') == "VIAJE") echo "checked"; ?>> Viaje</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_TipoServicio" name="Sv_TipoServicio" value="Doble" <?php if($data != NULL && $data->__GET('Sv_TipoServicio') == "DOBLE") echo "checked"; ?>> Doble</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Sv_TipoServicio" name="Sv_TipoServicio" value="Evento" <?php if($data != NULL && $data->__GET('Sv_TipoServicio') == "EVENTO") echo "checked"; ?>> Evento</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3">Examen Solicitado</label>
                  <div class="col-sm-9 mb-3">
                    <input type="text" class="form-control" id="" name="Sv_ExamenSolicitado" value="<?php if($data != NULL) echo $data->__GET('Sv_ExamenSolicitado') ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
          <hr>
          <button type="submit" class="btn btn-primary btn-block">GUARDAR REGISTRO</button>
          <hr>
        </form>
        <form action="../../Actions/Traslados/EstadoPac.php" method="POST">   
        <input type="hidden" name="IdServicio" id="" value="<?= $IdServicio ?>">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExamenFisico" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExamenFisico">
              <h6 class="m-0 font-weight-bold text-primary">EXAMEN FISICO</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExamenFisico">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-1">TA</label>
                  <div class="col-sm-2 mb-3">
                    <input type="text" class="form-control" id="" name="Ef_Ta" value="<?php if($data != NULL) echo $data->__GET('Ef_Ta') ?>">
                  </div>
                  <label class="col-sm-1">FR</label>
                  <div class="col-sm-2 mb-3">
                    <input type="text" class="form-control" id="" name="Ef_Fr" value="<?php if($data != NULL) echo $data->__GET('Ef_Fr') ?>">
                  </div>
                  <label class="col-sm-1">Temp</label>
                  <div class="col-sm-2 mb-3">
                    <input type="text" class="form-control" id="" name="Ef_Temp" value="<?php if($data != NULL) echo $data->__GET('Ef_Temp') ?>">
                  </div>
                  <label class="col-sm-1">Glasgow</label>
                  <div class="col-sm-2 mb-3">
                    <input type="text" class="form-control" id="" name="Ef_Glasgow" value="<?php if($data != NULL) echo $data->__GET('Ef_Glasgow') ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-1">Dx1</label>
                  <div class="col-sm-11 mb-3">
                    <input type="text" class="form-control" id="" name="Ef_Dx1" placeholder="Describa aqui el diagnostico..." value="<?php if($data != NULL) echo $data->__GET('Ef_Dx1') ?>">
                  </div>
                  <label class="col-sm-1">Dx2</label>
                  <div class="col-sm-11 mb-3">
                    <input type="text" class="form-control" id="" name="Ef_Dx2" placeholder="Describa aqui el diagnostico..." value="<?php if($data != NULL) echo $data->__GET('Ef_Dx2') ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 text-center">
                    <label>Hallazgos Positivos</label>
                    <textarea class="form-control" name="Ef_HallazgoPos1" rows="4" style="resize: vertical;" placeholder="Describa aqui los hallazgos..."><?php if($data != NULL) echo $data->__GET('Ef_HallazgoPos1') ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardAntecedentes" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardAntecedentes">
              <h6 class="m-0 font-weight-bold text-primary">ANTECEDENTES</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardAntecedentes">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 text-center">
                    <textarea class="form-control" name="Ef_Antecedentes1" rows="4" style="resize: vertical;" placeholder="Describa aqui los antecedentes..."><?php if($data != NULL) echo $data->__GET('Ef_Antecedentes1') ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2">GINECOLOGICOS</label>
                  <!-- <label class="col-sm-1">G</label> -->
                  <div class="col-sm-2 mb-3">
                    <label>G<input type="text" class="form-control" id="" name="Ef_Gin1" value="<?php if($data != NULL) echo $data->__GET('Ef_Gin1') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>P<input type="text" class="form-control" id="" name="Ef_Gin2" value="<?php if($data != NULL) echo $data->__GET('Ef_Gin2') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>C<input type="text" class="form-control" id="" name="Ef_Gin3" value="<?php if($data != NULL) echo $data->__GET('Ef_Gin3') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>A<input type="text" class="form-control" id="" name="Ef_Gin4" value="<?php if($data != NULL) echo $data->__GET('Ef_Gin4') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>V<input type="text" class="form-control" id="" name="Ef_Gin5" value="<?php if($data != NULL) echo $data->__GET('Ef_Gin5') ?>"></label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardConvenciones" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardConvenciones">
              <h6 class="m-0 font-weight-bold text-primary">CONVENCIONES</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardConvenciones">
              <div class="card-body">
                <div class="form-group row">
                  <!-- <label class="col-sm-1">G</label> -->
                  <div class="col-sm-2 mb-3">
                    <label>SAT.O2<input type="text" class="form-control" id="" name="Conven_1" value="<?php if($data != NULL) echo $data->__GET('Conven_1') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>SIST<input type="text" class="form-control" id="" name="Conven_2" value="<?php if($data != NULL) echo $data->__GET('Conven_2') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>F.R<input type="text" class="form-control" id="" name="Conven_3" value="<?php if($data != NULL) echo $data->__GET('Conven_3') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>F.C<input type="text" class="form-control" id="" name="Conven_4" value="<?php if($data != NULL) echo $data->__GET('Conven_4') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>TEMP<input type="text" class="form-control" id="" name="Conven_5" value="<?php if($data != NULL) echo $data->__GET('Conven_5') ?>"></label>
                  </div>
                  <div class="col-sm-2 mb-3">
                    <label>DÍAS<input type="text" class="form-control" id="" name="Conven_6" value="<?php if($data != NULL) echo $data->__GET('Conven_6') ?>"></label>
                  </div>
                </div>
             
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 text-center">
                    <textarea class="form-control" name="Obs_conv" rows="4" style="resize: vertical;" placeholder="Observaciones..."><?php if($data != NULL) echo $data->__GET('Obs_conv') ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>

          <hr>
          <button type="submit" class="btn btn-primary btn-block" <?php if($data == NULL) echo "disabled title='Guardar Informe'"; ?>> Guardar Informe Paciente</button>
          <hr>
        </form>
        
        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardSignosVitales" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardSignosVitales">
            <h6 class="m-0 font-weight-bold text-primary">SIGNOS VITALES</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardSignosVitales">
            <div class="card-body">
              <div class="form-group row">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr class="text-center">
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>TA</th>
                        <th>FC</th>
                        <th>FR</th>
                        <th>TEMP</th>
                        <th>GLASGOW</th>
                        <th>SatO2</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      <form action="../../Actions/Signos/AgregarSignos.php" method="POST">
                        <tr align="center">
                          <td style="padding: 0;"><input type="date" name="FechaHora" value="<?= date('Y-m-d') ?>" class="form-control" required></td>
                          <td style="padding: 0;"><input type="time" name="FechaHora2" value="<?= date('H:i') ?>" class="form-control" required></td>
                          <td style="padding: 0;"><input type="text" name="Sv_TA" value="" class="form-control" style="width: 100px;"></td>
                          <td style="padding: 0;"><input type="text" name="Sv_FC" value="" class="form-control" style="width: 100px;"></td>
                          <td style="padding: 0;"><input type="text" name="Sv_FR" value="" class="form-control" style="width: 100px;"></td>
                          <td style="padding: 0;"><input type="text" name="Sv_Temp" value="" class="form-control" style="width: 100px;"></td>
                          <td style="padding: 0;"><input type="text" name="Sv_Glasgow" value="" class="form-control" style="width: 100px;"></td>
                          <td style="padding: 0;"><input type="text" name="Sv_SatO2" value="" class="form-control" style="width: 100px;"></td>
                          <td style="padding: 0;" align="center"><button type="submit" class="btn btn-success" <?php if($data == NULL) echo "disabled title='Guarde el formulario primero'"; ?>><i class="fa fa-plus"></i></button></td>
                          <input type="hidden" name="IdServicio" id="" value="<?= $IdServicio ?>">
                        </tr>
                      </form>
                      <?php foreach ($HomeController->ListarxIdServicioOta_Informe_SignosVitales($IdServicio) as $key): ?>
                        <tr class="text-center">
                          <td><?= (new DateTime($key->__GET('FechaHora')))->format('d/m/Y') ?></td>
                          <td><?= (new DateTime($key->__GET('FechaHora')))->format('H:i') ?></td>
                          <td><?= $key->__GET('TA') ?></td>
                          <td><?= $key->__GET('FC') ?></td>
                          <td><?= $key->__GET('FR') ?></td>
                          <td><?= $key->__GET('Temp') ?></td>
                          <td><?= $key->__GET('Glasgow') ?></td>
                          <td><?= $key->__GET('SatO2') ?></td>
                          <td style="padding: 0;"><a href="../../Actions/Signos/EliminarSignos.php?IdServicio=<?= $IdServicio ?>&IdConsecutivo=<?= $key->__GET('IdConsecutivo') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#collapseCardLiquidoMed" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardLiquidoMed">
            <h6 class="m-0 font-weight-bold text-primary">LIQUIDOS Y MEDICAMENTOS</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="collapseCardLiquidoMed">
            <div class="card-body">
              <div class="form-group row">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr class="text-center">
                        <th>LEV</th>
                        <th>GOTEO</th>
                        <th>CANT_INFUN</th>
                        <th>INOTROPICO</th>
                        <th>GOTEO</th>
                        <th>CANT_INFUN</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <form action="../../Actions/Liquidos/AgregarLiquidos.php?IdServicio=<?= $IdServicio ?>" method="POST">
                        <tr align="center">
                          <td style="padding: 0;"><input type="text" name="LEV" value="" class="form-control" style="width: 200px;" required></td>
                          <td style="padding: 0;"><input type="text" name="Goteo" value="" class="form-control" style="width: 100px;" required></td>
                          <td style="padding: 0;"><input type="text" name="Cantidad" value="" class="form-control" style="width: 100px;" required></td>
                          <td style="padding: 0;"><input type="text" name="Inotropico" value="" class="form-control" style="width: 200px;" required></td>
                          <td style="padding: 0;"><input type="text" name="Goteo2" value="" class="form-control" style="width: 100px;" required></td>
                          <td style="padding: 0;"><input type="text" name="Cantidad2" value="" class="form-control" style="width: 100px;" required></td>
                          <td style="padding: 0;" align="center"><button type="submit" class="btn btn-success" <?php if($data == NULL) echo "disabled title='Guarde el formulario primero'"; ?>><i class="fa fa-plus"></i></button></td>
                        </tr>
                      </form>
                      <?php foreach ($HomeController->ListarxIdServicioOta_Informe_Liquidos($IdServicio) as $key): ?>
                        <tr class="text-center">
                          <td><?= $key->__GET('LEV') ?></td>
                          <td><?= $key->__GET('Goteo') ?></td>
                          <td><?= $key->__GET('Cantidad') ?></td>
                          <td><?= $key->__GET('Inotropico') ?></td>
                          <td><?= $key->__GET('Goteo2') ?></td>
                          <td><?= $key->__GET('Cantidad2') ?></td>
                          <td style="padding: 0;"><a href="../../Actions/Liquidos/EliminarLiquidos.php?IdServicio=<?= $IdServicio ?>&IdConsecutivo=<?= $key->__GET('IdConsecutivo') ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card shadow mb-12">
            <!-- Card Header - Accordion -->
            <a class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardFirmas">
              <h6 class="m-0 font-weight-bold text-primary">FIRMAS</h6>
            </a>
            <br>
            <div class="form-group row">
            <div class="col mb-6">
            <form action="firma/firma3.php" method="post" target="_blank">
              <input type="hidden" name="IdServicio" value="<?= $IdServicio ?>">
              <button type="submit" class="btn btn-success">Firma Paciente</button>
              <br>
              <img src="<?php if($data != NULL) echo $data->__GET('Firma1'); ?>" alt="">
            </form>
            </div>
            </div>
            <br>
            <div class="form-group row">
            <div class="col mb-6">
            <form action="firma/firma4.php" method="post" target="_blank">
              <input type="hidden" name="IdServicio" value="<?= $IdServicio ?>">
              <button type="submit" class="btn btn-success">Firma Médico y/o Paramédico</button>
              <br>
              <img src="<?php if($data != NULL) echo $data->__GET('Firma2'); ?>" alt="">
            </form>
            </div>
            </div>
            </div>

            <br>
      <form action="../../Actions/Traslados/FinTraslado.php" method="POST">
      <input type="hidden" name="IdServicio" value="<?= $IdServicio ?>">
          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardEstadoPaciente" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardEstadoPaciente">
              <h6 class="m-0 font-weight-bold text-primary">ESTADO DEL PACIENTE AL FINALIZAR TRASLADO</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardEstadoPaciente">
              <div class="card-body">
                  <div class="form-group row">
                  <div class="col-sm-12 col-md-12  ">
                    <label>Estado Del Paciente Al Finalizar Traslado</label>
                    <div class="col-sm-12">
                      <label class="col-sm-4"><input type="radio" class="" id="Estado_ft" name="Estado_ft" value="Estable" <?php if($data != NULL && $data->__GET('Estado_ft') == "Estable") echo "checked"; ?>> Estable</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Estado_ft" name="Estado_ft" value="Mejoro" <?php if($data != NULL && $data->__GET('Estado_ft') == "Mejoro") echo "checked"; ?>> Mejoró</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Estado_ft" name="Estado_ft" value="Descompenso" <?php if($data != NULL && $data->__GET('Estado_ft') == "Descompenso") echo "checked"; ?>> Descompensó</label>
                      <label class="col-sm-4"><input type="radio" class="" id="Estado_ft" name="Estado_ft" value="Fallecio" <?php if($data != NULL && $data->__GET('Estado_ft') == "Fallecio") echo "checked"; ?>> Falleció</label>
                    </div>
                  </div>
                  </div>

                <div class="form-group row">
                  <div class="col-sm-12 mb-3 text-center">
                    <textarea class="form-control" name="Obs_entrega" rows="4" style="resize: vertical;" placeholder="Observaciones al momento de la entrega..."><?php if($data != NULL) echo $data->__GET('Obs_entrega') ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>


<div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardTripulacion" class="d-block card-header py-3 bg-gradient-light" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardTripulacion">
              <h6 class="m-0 font-weight-bold text-primary">TRIPILACION QUE REALIZA TRASLADO</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardTripulacion">
              <div class="card-body">
              <div class="form-group row">
                    <label>Paramédico</label>
                    <div class="col-sm-3 mb-3">
                    <input type="text" class="form-control" id="" name="Parame" style="text-transform:uppercase;" required value="<?php if($data != NULL) echo $data->__GET('Parame') ?>">
                  </div>     
                    <label>C.C</label>
                    <div class="col-sm-3 mb-3">
                    <input type="number" class="form-control" id="" name="ccparame" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('ccparame') ?>">
                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="form-group row">
                    <label>Comandante</label>
                    <div class="col-sm-3 mb-3">
                    <input type="text" class="form-control" id="" name="Coman" style="text-transform:uppercase;" required value="<?php if($data != NULL) echo $data->__GET('Coman') ?>">
                  </div>     
                    <label>C.C</label>
                    <div class="col-sm-3 mb-3">
                    <input type="number" class="form-control" id="" name="ccoman" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('ccoman') ?>">
                  </div>
                </div>
              </div>
              <div class="card-body">
              <div class="form-group row">
                    <label>Médico</label>
                    <div class="col-sm-3 mb-3">
                    <input type="text" class="form-control" id="" name="Medico" style="text-transform:uppercase;" required value="<?php if($data != NULL) echo $data->__GET('Medico') ?>">
                  </div>     
                    <label>C.C</label>
                    <div class="col-sm-3 mb-3">
                    <input type="number" class="form-control" id="" name="ccmedico" style="text-transform:uppercase;" value="<?php if($data != NULL) echo $data->__GET('ccmedico') ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <hr>
          <button type="submit" class="btn btn-primary btn-block" <?php if($data == NULL) echo "disabled title='Finalizar Traslado'"; ?>> Finalizar Traslado</button>
          <hr>
        </form>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
        <span>Copyright &copy; 2022 Ota Ortoclinic</span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script type="text/javascript">
	function buscar() 
  {
    Pte_NumDoc = $("#Pte_NumDoc").val();
   // variable_2 = $("#id_campo2").val();
    
    var parametros = 
    {
      "buscar": "1",
      "Pte_NumDoc" : Pte_NumDoc
     // "variable_2" : variable_2
    };
    $.ajax(
    {
      data:  parametros,
      url:   '../../Actions/buscardoc/buscardoc.php',
      type:  'post',
      beforeSend: function() 
      {alert("enviando");}, 
      error: function()
      {alert("Error");},
      complete: function() 
      {alert("¡Listo!");},
      success:  function (mensaje) 
      {$('.resultados').html(mensaje);}
    }) 
  }
</script>

<?php include '../includes/footer.php'; ?>