<?php

$serverName = "190.242.112.94";
$connectionOptions = array("Database"=>"sena",
            "Uid"=>"sa", "PWD"=>"Admin@*", "CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn ){
    echo "Conexion establecida";
}
else{
    echo "La conexion no se pudo realizar";
    die (print_r(sqlsrv_errors(),true));
     
}


return $conn; 



?>