<?php
function Conexion(){

    $serverName = "190.242.112.94";
    $connectionOptions = array("Database"=>"sena","Uid"=>"Ota", "PWD"=>"Sena2022", "CharacterSet"=>"UTF-8");
    
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    return $conn;
}	


function getListaParamedico(){
    $conn = Conexion();
    $query = 'SELECT * FROM Ota_Usuario WHERE Tipo_U = 1';

    $result = sqlsrv_query($conn,$query);
    $listas = '<option value="0"> Seleccione Paramedico </option>';

    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $listas .= "<option value= '$row[IdUsuario]'> $row[Us_Nom1] $row[Us_Ape1] $row[Us_Ape2] </option>";
    }
    return $listas;
}

echo getListaParamedico();

?>

