<?php


$serverName = "192.168.2.199";
$connectionOptions = array("Database"=>"Sena","Uid"=>"sa", "PWD"=>"Dayan1001*", "CharacterSet"=>"UTF-8");

$conn = sqlsrv_connect($serverName, $connectionOptions);
/*if($conn ){
    echo "Conexion establecida";
}
else{
    echo "La conexion no se pudo realizar";
    die (print_r(sqlsrv_errors(),true));
     
}*/


return $conn; 



?>