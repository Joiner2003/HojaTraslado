<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../Resource/img/logota1.png" rel="icon">
    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../Resource/css/login.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="bg-gradient-primary">
<?php
/**
    * Author:
    * Ing Alberto Rodriguez
*
**/
require_once('../../Controllers/HomeController.php');
$HomeController = new HomeController();

require '../../Lib/FlashMessages.php';
if (!session_id()) @session_start();
// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
?>


<body class="bg-gradient-primary">

<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../Resource/img/logota1.png" class="brand_logo" alt="Logo">
					</div>
              
                </div>  
               
               
				<div class="d-flex justify-content-center form_container">
                    
				  <form action="../../Views/pages/login.php" method="POST">
                       
                <div><label>¿Estas Dentro o Fuera de la Empresa?</label></div>

                <div class="col-sm-12 mb-6">
                    <label class="col-sm-6"><input type="radio" class="" id="Conexion" name="Conexion" value="1" > DENTRO </label>
                    <label class="col-sm-6"><input type="radio" class="" id="Conexion" name="Conexion" value="2" > FUERA </label>  
                  </div>
        		<div class="d-flex justify-content-center mt-3">
				    <button type="submit" class="btn btn-success btn-user btn-block">Entrar</button>
				   </div>
					</form>
				</div>
               
			</div>
		</div>
	</div>

<?php include '../includes/footer.php'; ?>