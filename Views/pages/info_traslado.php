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
<table style="width:100%">
  <tr>
    <th colspan="4">Informacion General Del Paciente</th>
  </tr>
  <tr>
    <td colspan="2">Nombres: '.$data->__GET('PteNom1').' '.$data->__GET('Pte_Nom2').'</td>
    <td colspan="2">Apellidos: '.$data->__GET('Pte_Ap1').' '.$data->__GET('Pte_Ap2').' </td>
 
  </tr>
  <tr>
    <td>Identificación:  '.$data->__GET('Pte_NumDoc').'</td>
    <td>T Identificación:  '.$data->__GET('Pte_TipoDoc').' </td>
<td>Edad:  '.$data->__GET('Pte_Edad').'</td>
    <td>Fecha Nacimiento: '.$data->__GET('Pte_FechaNac').'</td>
  </tr>
  <tr>
  <td>Entidad</td>
  <td></td>
  <td>Regimen</td>
  </tr>
  
   <tr>
  <td>Telefono</td>
  <td></td>
  <td>Direccion</td>
  </tr>

  <tr>
    <th colspan="4">Informacion Del Acompañante</th>
  </tr>
   <tr>
    <td colspan="2">Nombres: </td>
    <td colspan="2">Apellidos: </td>
 
  </tr>
  <tr>
    <td>Identificación:</td>
    <td></td>
    <td>Parentesco:</td>
  </tr>
  </table>
  <br>
  <table style="width:100% ">
   <tr>
    <th colspan="4">Características Del Servicio</th>
  </tr>
   <tr>
   <td></td><td colspan="4">Desplazamientos </td>
   </tr>
  <tr>
    <td>Origen 1:</td>
     <td>Llegada:</td>
    <td></td>
    <td>Salida:</td>
    </tr>
    <tr>
    <td>Destino 1:</td>
    <td>Llegada:</td>
    <td></td>
    <td>Salida:</td>
  </tr>
  <tr>
    <td>Destino 2:</td>
    <td>Llegada:</td>
    <td></td>
    <td>Salida:</td>
  </tr>
  <tr>
   <td>Complejidad Del Servicio: </td>
   <td>Tipo De Servicio: </td>
  </tr>
  
</table>
</table>




';
$pdf->SetHeader($html);
$pdf->WriteHTML($content); 
$pdf->Output();