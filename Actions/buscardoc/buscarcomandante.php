<?php
function Conexion(){

    $serverName = "192.168.2.199";
    $connectionOptions = array("Database"=>"Sena","Uid"=>"sa", "PWD"=>"Dayan1001*", "CharacterSet"=>"UTF-8");
    
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    return $conn;
}	


function getListaComandante(){
    $conn = Conexion();
    $query = 'SELECT * FROM Ota_Usuario WHERE Tipo_U = 2';

    $result = sqlsrv_query($conn,$query);
    $listas = '<option value="0"> Seleccione Comandante </option>';

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $listas .= "<option value= '$row[IdUsuario]'> $row[Us_Nom1] $row[Us_Ape1] $row[Us_Ape2] </option>";
    }
    return $listas;
}

echo getListaComandante();

?>

