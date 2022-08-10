<?php
 $conn = mysqli_connect("otaips.com", "otaips_otatraslado", "Otatraslado2022", "otaips_Ota_Traslado", "3306");

/* ====================================== FALTAS SIN ATENDER MES ======================================*/
$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1) = 'January'"); 
$EneroIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1) = 'February'"); 
$FebreroIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1) = 'March'"); 
$MarzoIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1)  = 'April'"); 
$AbrilIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1)  = 'May'"); 
$MayoIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1)  = 'June'"); 
$JunioIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1)  = 'July'"); 
$JulioIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1)  = 'August'"); 
$AgostoIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1)  = 'September'"); 
$SeptIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1) = 'October'"); 
$OctIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1) = 'November'"); 
$NovIna = mysqli_num_rows($GrafInasistenciaMes);

$GrafInasistenciaMes = mysqli_query($conn, "SELECT MONTHNAME(Fecha1) FROM `Ota_Informe_Traslado` WHERE MONTHNAME(Fecha1) = 'December'"); 
$DicIna = mysqli_num_rows($GrafInasistenciaMes);
?>