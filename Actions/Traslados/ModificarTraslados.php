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
	$Fecha1 = $_POST['Fecha1'].'T'.$_POST['Fecha1Hora'].':00';
	$Ficha=$_POST['Ficha'];
	$Pte_NumDoc = $_POST['Pte_NumDoc'];
	$Pte_TipoDoc = strtoupper($_POST['Pte_TipoDoc']);
	if($_POST['Pte_FechaNac'] != ''){$Pte_FechaNac = $_POST['Pte_FechaNac'];}else{$Pte_FechaNac = NULL;}
	$Pte_Edad = $_POST['Pte_Edad'];
	$Entidad = strtoupper($_POST['Entidad']);
	if(isset($_POST['Pte_Regimen'])){$Pte_Regimen = $_POST['Pte_Regimen'];}else{$Pte_Regimen = 0;}
	if(isset($_POST['Pte_Sexo'])){$Pte_Sexo = $_POST['Pte_Sexo'];}else{$Pte_Sexo = 0;}
	$Pte_Telefono = strtoupper($_POST['Pte_Telefono']);
	$Pte_Direccion = strtoupper($_POST['Pte_Direccion']);
	$Pte_Ap1 = strtoupper($_POST['Pte_Ap1']);
	$Pte_Ap2 = strtoupper($_POST['Pte_Ap2']);
	$PteNom1 = strtoupper($_POST['PteNom1']);
	$Pte_Nom2 = strtoupper($_POST['Pte_Nom2']);
	$Aco_Nombres = strtoupper($_POST['Aco_Nombres']);
	$Aco_Apellidos = strtoupper($_POST['Aco_Apellidos']);
	$Aco_Documento = $_POST['Aco_Documento'];
	$Aco_Perentezco = strtoupper($_POST['Aco_Perentezco']);
	$Sv_Origen = strtoupper($_POST['Sv_Origen']);
	$Sv_Origen1 = strtoupper($_POST['Sv_Origen1']);
	$Sv_Origen2 = strtoupper($_POST['Sv_Origen2']);
	$Sv_Origen3 = strtoupper($_POST['Sv_Origen3']);
	$Sv_Llegada = strtoupper($_POST['Sv_Llegada']);
	$Sv_Llegada1 = strtoupper($_POST['Sv_Llegada1']);
	$Sv_Llegada2 = strtoupper($_POST['Sv_Llegada2']);
	$Sv_Llegada3 = strtoupper($_POST['Sv_Llegada3']);
	$Sv_Salida = strtoupper($_POST['Sv_Salida']);
	$Sv_Salida1 = strtoupper($_POST['Sv_Salida1']);
	$Sv_Salida2 = strtoupper($_POST['Sv_Salida2']);
	$Sv_Salida3 = strtoupper($_POST['Sv_Salida3']);
	$Sv_Complejidad = strtoupper($_POST['Sv_Complejidad']);
	$Sv_TipoServicio = strtoupper($_POST['Sv_TipoServicio']);
	$Sv_ExamenSolicitado = strtoupper($_POST['Sv_ExamenSolicitado']);




	if($HomeController->ModificarOta_Informe_Traslado($IdServicio, $Fecha1, $Ficha, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Entidad, $Pte_Regimen,$Pte_Sexo,$Pte_Telefono,$Pte_Direccion,$Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado) == true){

		$msg->success('!Modificado con exito¡');
	
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Modifico!..');
		
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}

/*function base64ToImage($base64_string, $output_file) {
	$file = fopen($output_file, "wb");
	$data = explode(',', $base64_string);
	fwrite($file, base64_decode($data[0]));
	fclose($file);
	return $output_file;
}*/
?>