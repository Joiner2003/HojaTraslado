<?php
session_start();
if(!isset($_SESSION["Usuario"])){
    header("location: ../../Views/pages/login.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Traslados</title>

    <!-- Custom fonts for this template-->
    <link href="../Resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="../Resource/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../Resource/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../Resource/css/style.css" rel="stylesheet">

</head>
<style type="text/css">
    .form-control{
        box-shadow: 1px 1px 10px 1px #b9b9b9;
    }
</style>
<?php date_default_timezone_set('America/Bogota'); ?>
<body id="page-top" class="sidebar-toggled">