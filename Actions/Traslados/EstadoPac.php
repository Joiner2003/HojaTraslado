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
    if(isset($_POST['Estado_ft'])){$Estado_ft = $_POST['Estado_ft'];}else{$Estado_ft = 0;}
    $Obs_entrega = $_POST['Obs_entrega'];

	/*if ($_FILES["Sv_Firma_Pte"]["name"]) {
		$NombreArchivo = $_FILES["Sv_Firma_Pte"]["name"];
		$Sv_Firma_Pte2tmp=$_FILES['Sv_Firma_Pte']['tmp_name'];

		move_uploaded_file($Sv_Firma_Pte2tmp,"Sv_Firma_Pte.png");
		$im1 = file_get_contents("Sv_Firma_Pte.png");
		$Sv_Firma_Pte2 = base64_encode($im1);

	}else{
		$Sv_Firma_Pte2 = '';
	}

	if ($_FILES["En_Firma"]["name"]) {
		$NombreArchivo = $_FILES["En_Firma"]["name"];
		$En_Firma2tmp=$_FILES['En_Firma']['tmp_name'];

		move_uploaded_file($En_Firma2tmp,"En_Firma.png");
		$im1 = file_get_contents("En_Firma.png");
		$En_Firma2 = base64_encode($im1);

	}else{
		$En_Firma2 = '';
	}

	if ($_FILES["Sv_Firma_Entrega"]["name"]) {
		$NombreArchivo = $_FILES["Sv_Firma_Entrega"]["name"];
		$Sv_Firma_Entrega2tmp=$_FILES['Sv_Firma_Entrega']['tmp_name'];

		move_uploaded_file($Sv_Firma_Entrega2tmp,"Sv_Firma_Entrega.png");
		$im1 = file_get_contents("Sv_Firma_Entrega.png");
		$Sv_Firma_Entrega2 = base64_encode($im1);

	}else{
		$Sv_Firma_Entrega2 = '';
	}*/

	// var_dump($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);

	if($HomeController->AgregarOta_Estado_Paciente($IdServicio, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5, $Estado_ft, $Obs_entrega ) == true){

		$msg->success('!Agregado con exito¡');
	/*	unlink("Sv_Firma_Pte.png");
		unlink("En_Firma.png");
		unlink("Sv_Firma_Entrega.png");*/
		header("location: ../../Views/pages/buscar.php");
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
	/*	unlink("Sv_Firma_Pte.png");
		unlink("En_Firma.png");
		unlink("Sv_Firma_Entrega.png");*/
		header("location: ../../Views/pages/buscar.php");
	}
}
?>