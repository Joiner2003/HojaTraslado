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

	
	$IdU= $_POST['IdU'];
	$C_Anterior = $_POST['C_Anterior'];
	$C_Nueva = $_POST['C_Nueva'];
	$Confirmar_C = $_POST['Confirmar_C'];

	$contradb=$HomeController->VerOta_Usuario($_SESSION['IdUsuario'])->__GET('Clave');
	if ($contradb===$C_Anterior) {
		if ($C_Anterior!=$C_Nueva) {
			if ($C_Nueva===$Confirmar_C) {
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
			} else {
				$msg->error('¡ERROR, Sus contraseñas no coinciden, vuelva a intertarlo.!..');
				header("location: ../../Views/pages/cambiarcontraseña.php");
			}
			
		} else {
			$msg->error('¡ERROR, Tu contraseña anterior es igual a la nueva, vuelva a intertarlo.!..');
			header("location: ../../Views/pages/cambiarcontraseña.php");
		}
		
	} else {
		$msg->error('¡ERROR, Tu contraseña anterior no coincide con la almacenada, vuelva a intertarlo.!..');
		header("location: ../../Views/pages/cambiarcontraseña.php");
	}

	
}
?>