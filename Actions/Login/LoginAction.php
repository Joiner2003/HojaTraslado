<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <?php header("Content-Type: text/html; charset=utf-8");?>
</head>

<?php 

	session_start();
	require_once('../../Controllers/HomeController.php');
	$HomeController = new HomeController();

	require '../../Lib/FlashMessages.php';
	if (!session_id()) @session_start();
	// Instantiate the class
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();

	$usuario = $_POST['usuario'];

	if ($Usuario = $HomeController->VerxUsuarioOta_Usuario($usuario)) {
		if ($Usuario->__GET('Clave') == ($_POST['password'])) {
			if ( $Usuario->__GET('Usuario') == $usuario) {
				$_SESSION['IdUsuario'] = $Usuario->__GET('IdUsuario');
				$_SESSION['Usuario'] = $Usuario->__GET('Usuario');

				//header("location: ../../Views/pages/buscar.php");
				echo '<script>window.location="../../Views/pages/buscar.php"</script>';
				$msg->success('Bienvanido '.$usuario);
			} else {
				$msg->error('ERROR, El Usuario es incorrecto..!');
				echo("<script language='javascript'>location.href='../../Views/pages/login.php?user=".$usuario."';</script>");		
			
			}
			
		}else{
			$msg->error('ERROR, La contraseña no es valida..!');
			echo("<script language='javascript'>location.href='../../Views/pages/login.php?user=".$usuario."';</script>");
		}
	}else{
		$msg->error('ERROR, El usuario '.$usuario.' no existe..!');
		echo("<script language='javascript'>location.href='../../Views/pages/login.php?user=".$usuario."';</script>");
	}
?>
