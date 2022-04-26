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
	if(isset($_POST['Estado_ft'])){$Estado_ft = $_POST['Estado_ft'];}else{$Estado_ft = 0;}
    $Obs_entrega = $_POST['Obs_entrega'];

    
	

	

	// var_dump($Fecha1, $Fecha2, $Pte_NumDoc, $Pte_TipoDoc, $Pte_FechaNac, $Pte_Edad, $Pte_Ap1, $Pte_Ap2, $PteNom1, $Pte_Nom2, $Aco_Nombres, $Aco_Apellidos, $Aco_Documento, $Aco_Perentezco, $Sv_Origen, $Sv_Origen1, $Sv_Origen2, $Sv_Origen3, $Sv_Llegada, $Sv_Llegada1, $Sv_Llegada2, $Sv_Llegada3, $Sv_Salida, $Sv_Salida1, $Sv_Salida2, $Sv_Salida3, $Sv_Complejidad, $Sv_TipoServicio, $Sv_ExamenSolicitado, $Ef_Ta, $Ef_Fr, $Ef_Temp, $Ef_Glasgow, $Ef_Dx1, $Ef_Dx2, $Ef_HallazgoPos1, $Ef_Antecedentes1, $Ef_Gin1, $Ef_Gin2, $Ef_Gin3, $Ef_Gin4, $Ef_Gin5);

	if($HomeController->AgregarOta_Fin_Traslado($IdServicio,$Estado_ft,$Obs_entrega) == true){

		$msg->success('!Agregado con exito¡');
	
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
	
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}
?>