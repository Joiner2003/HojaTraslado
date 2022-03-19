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
define( 'MAX_SESSION_TIME', 3600 * 12 ); // 12 hora
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

	$IdServicio = $_GET['IdServicio'];
	$LEV = $_POST['LEV'];
	$Goteo = $_POST['Goteo'];
	$Cantidad = $_POST['Cantidad'];
	$Inotropico = $_POST['Inotropico'];
	$Goteo2 = $_POST['Goteo2'];
	$Cantidad2 = $_POST['Cantidad2'];

	if($HomeController->AgregarOta_Informe_Liquidos($IdServicio, $LEV, $Goteo, $Cantidad, $Inotropico, $Goteo2, $Cantidad2) == true){

		$msg->success('!Agregado con exito¡');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}
?>