<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php 
/**
	* Author:
	* Ing Joiner Escorcia - Juan Gomez
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

	
	
	$Fecha1 = $_POST['Fecha1'].' '.$_POST['Fecha1Hora'].':00';
	$Ficha = $_POST['Ficha'];
	$Pte_NumDoc = $_POST['Pte_NumDoc'];
	$Pte_TipoDoc = strtoupper($_POST['Pte_TipoDoc']);
	if($_POST['Pte_FechaNac'] != ''){$Pte_FechaNac = $_POST['Pte_FechaNac'];}else{$Pte_FechaNac = NULL;}
	$Pte_Edad = $_POST['Pte_Edad'];
	$Entidad = $_POST['Entidad'];
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
	if(isset($_POST['Sv_Complejidad'])){$Sv_Complejidad = $_POST['Sv_Complejidad'];}else{$Sv_Complejidad = 0;}
	if(isset($_POST['Sv_TipoServicio'])){$Sv_TipoServicio = $_POST['Sv_TipoServicio'];}else{$Sv_TipoServicio = 0;}
	$Sv_ExamenSolicitado = $_POST['Sv_ExamenSolicitado'];
	$IdU=($_POST['IdUsuario']);


	// var_dump($Fecha1, $Ficha, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);

	if($HomeController->AgregarOta_Informe_Traslado($Fecha1, $Ficha, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Entidad,$Pte_Regimen,$Pte_Sexo, $Pte_Telefono,$Pte_Direccion,$Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $IdU) == true){

		$msg->success('!Agregado con exito¡');

		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
	
		header("location: ../../Views/pages/buscar.php");
	}
}
?>