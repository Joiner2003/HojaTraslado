<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php 
/**
	* Author:
	* Ing Juan Gómez y Joiner Escorcia
*
**/
session_start();
if(!isset($_SESSION["Usuario"])){
	header("location: ../../Views/pages/login.php");
}else{
	require_once('../../Controllers/HomeController.php');
	$HomeController = new HomeController();

	require '../../Lib/FlashMessages.php';
	if (!session_id()) @session_start();
	// Instantiate the class
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();
	date_default_timezone_set('America/Bogota');

	if (isset($_GET['Usuario'])) {
		$IdUsuario = $_GET['Usuario'];
		$data = $HomeController->VerOta_Usuario($IdUsuario);
	  }else{
		$IdUsuario = $HomeController->VerOta_Usuario($IdUsuario);
		$data = NULL;
	  }

	$IdU= $_POST['IdU'];
	$C_Anterior = $_POST['C_Anterior'];
	$C_Nueva = $_POST['C_Nueva'];
	$Confirmar_C = $_POST['Confirmar_C'];

	/*if ($Usuario = $HomeController->VerOta_Usuario($C_Anterior)) {
		if ($Usuario->__GET('Clave') == ($_POST['C_Anterior'])) {
			$msg ->error ('Coloca una clave diferente, es igual a la de la base de datos ');
			header("location: ../../Views/pages/cambiarcontraseña.php");
		}else {
			header("location: ../../Views/pages/cambiarcontraseña.php");
			$msg ->error ('Clave diferente ');
		}
	}	*/
	

	// var_dump($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);

	if($HomeController->Modificar_Password($IdU, $C_Nueva) == true){

		$msg->success('!Se ha actualizado correctamente¡');
	/*	unlink("Sv_Firma_Pte.png");
		unlink("En_Firma.png");
		unlink("Sv_Firma_Entrega.png");*/
		header("location: ../../Views/pages/buscar.php");
	}else{
		$msg->error('¡ERROR, no se pudo actualizar!..');
	/*	unlink("Sv_Firma_Pte.png");
		unlink("En_Firma.png");
		unlink("Sv_Firma_Entrega.png");*/
		header("location: ../../Views/pages/buscar.php");
	}
}
?>