<?php
require_once '../../Lib/mpdf/vendor/autoload.php';
require_once('../../Controllers/HomeController.php');
$HomeController = new HomeController();
date_default_timezone_set('America/Bogota');
session_start();
$ips = $HomeController->VerIPS();
$pdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'stretch', 'default_font' => 'arial', 'default_font_size' => 10 ]);
$html = '
<table width="100%" border="1" style="font-size: 12px">
    <tr>
        <td rowspan="4" colspan="2" align="center">
            <img src="../Resource/img/ambulancia.png" width="130" height="40">
        </td>
        <td rowspan="4" colspan="4" align="center" valign="middle" width="60%">
            <strong style="font-size: 16px">HOJA DE TRASLADOS</strong><br>
            '.$ips->__GET('NombreIPS').' <br>
            NIT. '.$ips->__GET('Nit').'<br>
            '.$ips->__GET('Direccion').' '.$ips->__GET('Municipio').' '.$ips->__GET('Departamento').'<br>
            Telefono: '.$ips->__GET('Telefono').'
        </td>
        <td colspan="1"><strong>Codigo:</strong></td>
        <td colspan="1" align="center"></td>
    </tr>
    <tr>
        <td colspan="1"><strong>Version:</strong></td>
        <td colspan="1" align="center"></td>
    </tr>
    <tr>
        <td colspan="1"><strong>Fecha:</strong></td>
        <td colspan="1" align="center">'.date('d/m/Y').'</td>
    </tr>
    <tr>
        <td colspan="1"><strong>Pagina:</strong></td>
        <td colspan="1" align="center">'."{PAGENO}"." De "."{nb}".'</td>
    </tr>
</table><br>
';

$content ='

';
$pdf->SetHeader($html);
$pdf->WriteHTML($content); 
$pdf->Output();