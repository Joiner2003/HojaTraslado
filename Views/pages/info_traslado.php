<?php
 ob_start();

?>
<?php

require_once '../../Lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();

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

  $nombreImagen = "../Resource/img/logoota2.jpg";
  $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagen));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<table width="100%" border="1" style="font-size: 12px">
    <tr>
        <td rowspan="4" colspan="2" align="center">
            <img src="<?php echo $imagenBase64?>" width="120" height="120">
        </td>
        <td rowspan="4" colspan="4" align="center" valign="middle" width="60%">
            <strong style="font-size: 16px">HOJA DE TRASLADOS</strong><br>
           <?php echo $ips->__GET('NombreIPS') ?><br>
           <?php echo "NIT ".$ips->__GET('Nit')?><br>
           <?php echo $ips->__GET('Direccion')?><br>
           <?php echo $ips->__GET('Municipio').' '.$ips->__GET('Departamento')?><br>
           <?php echo "Telefono:".$ips->__GET('Telefono')?>
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
        <td colspan="1" align="center"><?php echo date('d/m/Y')?></td>
    </tr>
    <tr>
        <td colspan="1"><strong>Pagina:</strong></td>
        <td colspan="1" align="center"><?php echo  "PAGE_NUM of PAGE_COUNT"?></td>
    </tr>
</table><br>

<table style="width:100%">
  <tr>
    <th colspan="4">Informacion General Del Paciente</th>
  </tr>
  <tr>
    <td colspan="2"><?php echo "Nombres: ". $data->__GET('PteNom1').' '.$data->__GET('Pte_Nom2')?></td>
    <td colspan="2"><?php echo "Apellidos: " .$data->__GET('Pte_Ap1').' '.$data->__GET('Pte_Ap2')?> </td>
  </tr>
  <tr>
    <td> <?php echo "Identificación: " .$data->__GET('Pte_NumDoc')?></td>
    <td> <?php echo "T Identificación: " .$data->__GET('Pte_TipoDoc') ?></td>
    <td> <?php echo "Edad: " .$data->__GET('Pte_Edad') ?></td>
    </tr>
    <tr>
    <td><?php echo "Fecha Nacimiento: " .$data->__GET('Pte_FechaNac')?></td>
    <td>Entidad:</td>
    <td><?php echo "Regimen: ".$data->__GET('Pte_Regimen')?></td>
  </tr>
   <tr>
  <td> <?php echo "Telefono: ".$data->__GET('Pte_Telefono') ?> </td>
  <td></td>
  <td><?php echo "Direccion: ".$data->__GET('Pte_Direccion') ?></td>
  </tr>
  <tr>
    <th colspan="4">Informacion Del Acompañante</th>
  </tr>
   <tr>
    <td colspan="2"><?php echo 'Nombres: '.$data->__GET('Aco_Nombres') ?></td>
    <td colspan="2"><?php echo 'Apellidos: '.$data->__GET('Aco_Apellidos') ?></td>
  </tr>
  <tr>
    <td><?php echo 'Identificación: '.$data->__GET('Aco_Documento') ?></td>
    <td></td>
    <td> <?php echo 'Parentesco: '.$data->__GET('Aco_Perentezco')?></td>
  </tr>
  </table>
  <br>
  <table style="width:100% ">
   <tr>
    <th colspan="4">Características Del Servicio</th>
  </tr>
   <tr>
   </tr>
  <tr>
    <td><?php echo 'Origen 1:  '.$data->__GET('Sv_Origen')?></td>
     <td><?php echo 'Llegada:  '.$data->__GET('Sv_Llegada')?></td>
    <td></td>
    <td><?php echo 'Salida:  '.$data->__GET('Sv_Salida')?></td>
    </tr>
    <tr>
    <td><?php echo 'Destino 1:  '.$data->__GET('Sv_Origen1')?></td>
    <td><?php echo 'Llegada:  '.$data->__GET('Sv_Llegada1')?></td>
    <td></td>
    <td><?php echo 'Salida:  '.$data->__GET('Sv_Salida1')?></td>
  </tr>
  <tr>
    <td><?php echo 'Destino 2:  '.$data->__GET('Sv_Origen2')?></td>
    <td><?php echo 'Llegada:  '.$data->__GET('Sv_Llegada2')?></td>
    <td></td>
    <td><?php echo 'Salida:  '.$data->__GET('Sv_Salida2')?></td>
  </tr>
  <tr>
   <td><?php echo 'Complejidad Del Servicio:  '.$data->__GET('Sv_Complejidad')?></td>
   <td><?php echo 'Tipo De Servicio:  '.$data->__GET('Sv_TipoServicio')?></td>
  </tr>
  <tr>
  <td><?php echo 'Examen Solicitado: '.$data->__GET('Sv_ExamenSolicitado')?></td>
 </tr>
</table>
<br>
 <table style="width:100% ">
  <tr>
   <th colspan="4">Examen Físico Pre-Traslado</th>
 </tr>
 <tr>
   <td><?php echo 'T/A: '.$data->__GET('Ef_Ta')?></td>
   <td><?php echo 'F.R: '.$data->__GET('Ef_Fr')?></td>
   </tr>
   <tr>
   <td><?php echo 'TEMP: '.$data->__GET('Ef_Temp')?></td>
   <td><?php echo 'GLASSGOW: '.$data->__GET('Ef_Glasgow')?></td>
 </tr>
 <tr>
   <td><?php echo 'Diagnostico 1: '.$data->__GET('Ef_Dx1')?></td>
   <td><?php echo 'Diagnostico 2: '.$data->__GET('Ef_Dx2')?></td>
 </tr>
 <tr>
  <td><?php echo 'Hallazgos Positivos: '.$data->__GET('Ef_HallazgoPos1')?></td>
 </tr>
 <tr>
  <td><?php echo 'Antecedentes: '.$data->__GET('Ef_Antecedentes1')?></td>
 </tr>
 </table>
 <table style="width:100% ">
 <tr>
   <th colspan="4">Ginecológicos</th>
 </tr>
</table>
 <table style="width:100% ">
 <tr>
   <td><?php echo 'G: '.$data->__GET('Ef_Gin1')?></td>
   <td><?php echo 'P: '.$data->__GET('Ef_Gin2')?></td>
   <td><?php echo 'C: '.$data->__GET('Ef_Gin3')?></td>
   <td><?php echo 'A: '.$data->__GET('Ef_Gin4')?></td>
   <td><?php echo 'V: '.$data->__GET('Ef_Gin5')?></td>
   </tr>
   </table>
 <table style="width:100% ">
   <tr>
   <th colspan="4">Ventilacion Mecánica</th>
 </tr>
   <tr>
  <td><?php echo 'Oxígeno: '.$data->__GET('Ef_Modo1')?></td>
   <td><?php echo 'VOL:'?></td>
   <td><?php echo 'P.E.E.P.: '.$data->__GET('Ef_Modo2')?></td>
   </tr>
   <tr>
   <td><?php echo 'Inotropia: '.$data->__GET('Ef_Modo3')?></td>
   <td><?php echo 'FR: '.$data->__GET('Ef_Modo4')?></td>
   <td><?php echo 'FIOZ: '.$data->__GET('Ef_Modo5')?></td>
   </tr>
   </table>
   <table style="width:100% ">
     <tr>
      <th colspan="4">Signos Vitales</th>
    </tr>
    </table>
    <table style="width:100% ">
    <tr>
    <?php foreach ($HomeController->ListarxIdServicioOta_Informe_SignosVitales($IdServicio) as $key): ?>
                        <tr class="text-center">
                          <td><?= print("Fecha: ").(new DateTime($key->__GET('FechaHora')))->format('d/m/Y') ?></td>
                          <td><?= print("Hora: ").(new DateTime($key->__GET('FechaHora')))->format('H:i') ?></td>
                          <td><?= print("TA: ").$key->__GET('TA') ?></td>
                          <td><?= print("FC: ").$key->__GET('FC') ?></td>
                          <td><?= print("FR: ").$key->__GET('FR') ?></td>
                          <td><?= print("TEMP: ").$key->__GET('Temp') ?></td>
                          <td><?= print("GLASGOW: ").$key->__GET('Glasgow') ?></td>
                          <td><?= print("SAT02: ").$key->__GET('SatO2') ?></td>
                         </tr>
                      <?php endforeach ?>
    </tr>
   </table>
   <table style="width:100% ">
     <tr>
      <th colspan="4">Control De Liquidos Y Medicamentos</th>
    </tr>
    </table>
    <table style="width:100% ">
    <tr>
    <?php foreach ($HomeController->ListarxIdServicioOta_Informe_Liquidos($IdServicio) as $key): ?>
                        <tr class="text-center">
                          <td><?=  print("LEV: ").$key->__GET('LEV') ?></td>
                          <td><?=  print("Goteo: ").$key->__GET('Goteo') ?></td>
                          <td><?=  print("Cantidad: ").$key->__GET('Cantidad') ?></td>
                          <td><?=  print("Inotropico: ").$key->__GET('Inotropico') ?></td>
                          <td><?=  print("Goteo2: ").$key->__GET('Goteo2') ?></td>
                          <td><?=  print("Cantidad2: ").$key->__GET('Cantidad2') ?></td>
                          </tr>
                      <?php endforeach ?> 
    </tr>
   </table>
   <table style="width:100% ">
   <tr>
      <th colspan="4">Estado Del Paciente Al Finalizar Traslado</th>
    </tr>
     <tr>
      <td><?php echo 'Estado Del Paciente Al Finalizar Traslado: '.$data->__GET('Estado_ft')?></td>
    </tr>
    <tr>
      <td><?php echo 'Observaciones Al Momento De La Entrega: '.$data->__GET('Obs_entrega')?></td>
    </tr>
</table>
<table style="width:100% ">
<tr>
  <td><?php echo 'Firma Paciente o Acompañante:  <img src='. $data->__GET('Firma1')?>></td>
  <td></td>
  <td><?php echo 'Firma Médico o Enfermera(o) Que Entrega:  <img src='. $data->__GET('Firma2')?>></td>
   </tr>
    </table>
</body>
</html>



<?php

$html= ob_get_clean();
//echo $html;


$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();
$dompdf->stream("traslado_.pdf", array("Attachment"=>false))
/*$pdf->SetHeader($html);
$pdf->WriteHTML($content); 
$pdf->Output();*/
?>