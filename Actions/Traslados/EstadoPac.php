<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php 
/**
	* Author:
	* Ing Alberto Rodriguez
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


    $IdServicio = $_POST['IdServicio'];
	$Ef_Ta = $_POST['Ef_Ta'];
	$Ef_Fr = $_POST['Ef_Fr'];
	$Ef_Temp = $_POST['Ef_Temp'];
	$Ef_Glasgow = $_POST['Ef_Glasgow'];
	$Ef_Dx1 = $_POST['Ef_Dx1'];
	$Ef_Dx2 = $_POST['Ef_Dx2'];
	$Ef_HallazgoPos1 = $_POST['Ef_HallazgoPos1'];
	$Ef_Antecedentes1 = $_POST['Ef_Antecedentes1'];
	$Ef_Gin1 = $_POST['Ef_Gin1'];
	$Ef_Gin2 = $_POST['Ef_Gin2'];
	$Ef_Gin3 = $_POST['Ef_Gin3'];
	$Ef_Gin4 = $_POST['Ef_Gin4'];
	$Ef_Gin5 = $_POST['Ef_Gin5'];
	$Oxigeno = $_POST['Oxigeno'];
	$VOL = $_POST['VOL'];
	$PEEP = $_POST['PEEP'];
	$Inotropia = $_POST['Inotropia'];
	$FR = $_POST['FR'];
	$FIOZ = $_POST['FIOZ'];
	$Conven_1 = $_POST['Conven_1'];
	$Conven_2 = $_POST['Conven_2'];
	$Conven_3 = $_POST['Conven_3'];
	$Conven_4 = $_POST['Conven_4'];
	$Conven_5 = $_POST['Conven_5'];
	$Conven_6 = $_POST['Conven_6'];
	$Obs_conv = $_POST['Obs_conv'];

	
	// var_dump($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);

	if($HomeController->AgregarOta_Estado_Paciente($IdServicio, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5, $Oxigeno, $VOL, $PEEP, $Inotropia, $FR, $FIOZ, $Conven_1,$Conven_2,$Conven_3,$Conven_4,$Conven_5,$Conven_6,$Obs_conv ) == true){

		$msg->success('!Agregado con exito¡');
	/*	unlink("Sv_Firma_Pte.png");
		unlink("En_Firma.png");
		unlink("Sv_Firma_Entrega.png");*/
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
	/*	unlink("Sv_Firma_Pte.png");
		unlink("En_Firma.png");
		unlink("Sv_Firma_Entrega.png");*/
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}
?>