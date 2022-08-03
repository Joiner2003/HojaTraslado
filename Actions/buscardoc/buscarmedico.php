<?php
function Conexion(){

    //$conn = mysqli_connect("localhost", "root", "Otatraslado2022", "sena", "3306");
    $conn = mysqli_connect("otaips.com", "otaips_otatraslado", "Otatraslado2022", "otaips_Ota_Traslado", "3306");

return $conn;

}	


function getListaMedico(){
    $conn = Conexion();
    $query = 'SELECT * FROM Ota_Usuario WHERE Tipo_U = 3';

    $result = mysqli_query($conn,$query);
    $listas = '<option value="0"> Seleccione Medico </option>';

    while ($row =  mysqli_fetch_assoc($result)) {
        $listas .= "<option value= '$row[IdUsuario]'> $row[Us_Nom1] $row[Us_Ape1] $row[Us_Ape2] </option>";
    }
    return $listas;
}

echo getListaMedico();

?>

