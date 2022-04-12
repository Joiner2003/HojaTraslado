<?php
require_once '../../Lib/mpdf/vendor/autoload.php';
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

$pdf = new \Mpdf\Mpdf(['setAutoTopMargin' => 'stretch', 'default_font' => 'arial', 'default_font_size' => 10 ]);
$html = '
<table width="100%" border="1" style="font-size: 12px">
    <tr>
        <td rowspan="4" colspan="2" align="center">
            <img src="../Resource/img/logoota2.jpg" width="120" height="120">
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
<table width="100%" border="1" style="font-size: 12px">
    <tr>
        
        <td rowspan="4" colspan="4" align="center" valign="middle" width="60%">
            <strong style="font-size: 16px">HOJA DE TRASLADOS</strong><br>
            '.$data->__GET('IdServicio').' <br>
            NIT. '.$data->__GET('Fecha1').'<br>
            '.$data->__GET('Pte_Ap1').' '.$data->__GET('PteNom1').' '.$data->__GET('PteNom2').'<br>
            Telefono: '.$data->__GET('Telefono').'
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


<table width="100%" border="1" style="font-size: 12px">
    <tr>
        
        <td rowspan="4" colspan="4" align="center" valign="middle" width="60%">
            <strong style="font-size: 16px">INFORMACION GENERAL DEL PACIENTE</strong><br>
            '.$data->__GET('IdServicio').' <br>
            NIT. '.$data->__GET('Fecha1').'<br>
            '.$data->__GET('Pte_Ap1').' '.$data->__GET('PteNom1').' '.$data->__GET('PteNom2').'<br>
            Telefono: '.$data->__GET('Telefono').'
        </td>
        <br>
    </tr>

</table><br>



';
$pdf->SetHeader($html);
$pdf->WriteHTML($content); 
$pdf->Output();