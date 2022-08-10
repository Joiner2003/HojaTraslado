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

	$IdConsecutivo = $_POST['IdConsecutivo'];
	$IdServicio = $_POST['IdServicio'];
	$FechaHora = $_POST['FechaHora'].'T'.$_POST['FechaHora2'].':00';
	$TA = $_POST['Sv_TA'];
	$FC = $_POST['Sv_FC'];
	$FR = $_POST['Sv_FR'];
	$Temp = $_POST['Sv_Temp'];
	$Glasgow = $_POST['Sv_Glasgow'];
	$SatO2 = $_POST['Sv_SatO2'];

	if($HomeController->AgregarOta_Informe_SignosVitales($IdConsecutivo, $IdServicio, $FechaHora, $TA, $FC, $FR, $Temp, $Glasgow, $SatO2) == true){

		$msg->success('!Agregado con exito¡');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}
?>