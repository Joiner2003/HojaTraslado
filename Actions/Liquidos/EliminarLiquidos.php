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

	$IdConsecutivo = $_GET['IdConsecutivo'];
	$IdServicio = $_GET['IdServicio'];

	if($HomeController->EliminarOta_Informe_Liquidos($IdConsecutivo) == true){

		$msg->success('!Eliminado con exito¡');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Elimino!..');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}
?>