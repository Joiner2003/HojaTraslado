<?php

$serverName = "190.242.112.94";
$connectionOptions = array("Database"=>"sena",
<<<<<<< HEAD
            "Uid"=>"sa", "PWD"=>"Admin@*", "CharacterSet"=>"UTF-8");
=======
            "Uid"=>"Ota", "PWD"=>"Sena2022", "CharacterSet"=>"UTF-8");
>>>>>>> 8b80916b7d3201067fc51c9af62b4d58bd09e96e
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