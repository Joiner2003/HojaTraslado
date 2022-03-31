<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php 
/**
	* Author:
	* Ing Joiner Escorcia
    * Juan Gomez
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

	$Pte_NumDoc = $_GET['Pte_NumDoc'];
    $valores = array();
    $valores['existe'] = "0";
    
    
    if($HomeController->BuscarPaciente($Pte_NumDoc, $valores) == true){

		$msg->success('!Agregado con exito¡');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}else{
		$msg->error('¡ERROR, no se Agrego!..');
		header("location: ../../Views/pages/index.php?IdServicio=".$IdServicio);
	}
}
?>