<?php

require_once('../../Controllers/HomeController.php');
$HomeController = new HomeController();
date_default_timezone_set('America/Bogota');
session_start();
$ips = $HomeController->VerIPS();
if (isset($_GET['IdServicio'])) {
    $IdServicio = $_GET['IdServicio'];
    $data = $HomeController->VerOta_Informe_Traslado($IdServicio);
  }else{
    $IdServicio = $HomeController->MaximoOta_Informe_Traslado()->__GET('IdServicio')+1;
    $data = NULL;
  }
  require_once '../../Lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();
$pdf->SetHeader($html);
$pdf->WriteHTML($content); 
$pdf->Output();
?>