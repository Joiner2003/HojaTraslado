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
?>
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

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
        <li class="nav-item">
            <a class="nav-link" href="index.php"><i class="fas fa-fw fa-file"></i><span>NUEVO</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item active">
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
                    <h2>Busqueda de Traslado</h2>
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
                  

                    <!-- Nav Item - Messages -->
                    

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Ape1').' '.$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Ape2').' '.$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Nom1').' '.$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Us_Nom2') ?></span><img class="img-profile rounded-circle"src="../Resource/img/undraw_profile.svg"></a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#"><i class="fas fa-solid fa-unlock fa-fw mr-2 text-gray-400"></i>Cambiar contraseña</a>
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
                <div class="row">
                    <div class="col-md-12 text-right">
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Numero de Servicio..." aria-label="Search" aria-describedby="basic-addon2" name="IdServicio" autocomplete="off">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="tablaFiltro">
                                <thead>
                                    <tr class="text-center">
                                        <th>IDSERVICIO</th>
                                        <th>FECHA</th>
                                        <th>PACIENTE</th>
                                        <th>DOCUMENTO</th>
                                        <th>ORIGEN</th>
                                        <th>VER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($_GET['IdServicio'])){ ?>
                                        <?php $key = $HomeController->VerOta_Informe_Traslado($_GET['IdServicio']); ?>
                                        <?php if ($key != NULL){ ?>
                                            <tr>
                                                <td align="center"><?= $key->__GET('IdServicio') ?></td>
                                                <td align="center"><?= (new DateTime($key->__GET('Fecha1')))->format('d/m/Y H:i:s') ?></td>
                                                <td><?= $key->__GET('Pte_Ap1').' '.$key->__GET('Pte_Ap2').' '.$key->__GET('PteNom1').' '.$key->__GET('Pte_Nom2') ?></td>
                                                <td><?= $key->__GET('Pte_NumDoc') ?></td>
                                                <td><?= $key->__GET('Sv_Origen') ?></td>
                                                <td align="center" style="padding: 0;"> <a href="index.php?IdServicio=<?= $key->__GET('IdServicio') ?>" title="Ver" class="btn btn-success"><i class="fa fa-eye"></i></a> <a href="info_traslado.php?IdServicio=<?= $key->__GET('IdServicio') ?>" title="Imprimir" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <?php foreach ($HomeController->ListarOta_Informe_Traslado() as $key){ ?>
                                            <tr>
                                                <td align="center"><?= $key->__GET('IdServicio') ?></td>
                                                <td align="center"><?= (new DateTime($key->__GET('Fecha1')))->format('d/m/Y H:i:s') ?></td>
                                                <td><?= $key->__GET('Pte_Ap1').' '.$key->__GET('Pte_Ap2').' '.$key->__GET('PteNom1').' '.$key->__GET('Pte_Nom2') ?></td>
                                                <td><?= $key->__GET('Pte_NumDoc') ?></td>
                                                <td><?= $key->__GET('Sv_Origen') ?></td>
                                                <td align="center" style="padding: 0;"> <a href="index.php?IdServicio=<?= $key->__GET('IdServicio') ?>" title="Ver" class="btn btn-success"><i class="fa fa-eye"></i></a> <a href="info_traslado.php?IdServicio=<?= $key->__GET('IdServicio') ?>" title="Imprimir" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <a href="https://otaips.com/" target="_blank"><span>Copyright &copy; 2022 Ota Ortoclinic</span></a>
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

    <?php include '../includes/footer.php'; ?>