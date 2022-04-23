<?php
 ob_start();

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

</body>
</html>



<?php

$html= ob_get_clean();
//echo $html;

require_once '../../Lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("traslado_.pdf", array("Attachment"=>false))
/*$pdf->SetHeader($html);
$pdf->WriteHTML($content); 
$pdf->Output();*/
?>